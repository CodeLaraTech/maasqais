<?php

namespace Modules\LMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\LMS\Models\Student;
use Modules\LMS\Models\Course;
use Modules\LMS\Models\Instructor;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('instructors')->latest()->paginate(8);
        return view('lms::courses.index', compact('courses'));
    }

    public function create()
    {
        $instructors = Instructor::all();
        return view('lms::courses.create', compact('instructors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'name_ur' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_ur' => 'nullable|string',
            'instructor_ids' => 'nullable|array',
            'instructor_ids.*' => 'exists:instructors,id',
            'fee' => 'nullable|numeric',
            'price_display' => 'nullable|string|max:255',
            'currency' => 'nullable|string|max:10',
            'duration_value' => 'nullable|integer',
            'duration_type' => 'nullable|string|in:days,weeks,months,years',
            'enrollments' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        // Unique Slug
        $baseSlug = Str::slug($request->name_en);
        $slug = $baseSlug;
        $count = 1;
        while (Course::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('courses', 'public')
            : null;

        $course = Course::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
                'ur' => $request->name_ur,
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
                'ur' => $request->description_ur,
            ],
            'slug' => $slug,
            'fee' => $request->fee,
            'currency' => $request->currency,
            'price_display' => $request->price_display,
            'duration_value' => $request->duration_value,
            'duration_type' => $request->duration_type,
            'enrollments' => $request->enrollments,
            'image' => $imagePath,
        ]);

        if ($request->filled('instructor_ids')) {
            $course->instructors()->sync($request->instructor_ids);
        }

        return redirect()->route('lms.courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function show($id)
{
    $course = Course::with('students')->findOrFail($id);

    // Fetch all students (only active ones if needed)
    $students = Student::where('is_active', 1)->get();

    return view('lms::courses.show', compact('course', 'students'));
}

public function assignStudents(Request $request, Course $course)
{
    // Attach selected students to the course
    $course->students()->sync($request->input('students', []));

    return redirect()
        ->route('lms.courses.show', $course->id)
        ->with('success', 'Students assigned successfully.');
}

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $instructors = Instructor::all();
        return view('lms::courses.edit', compact('course', 'instructors'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'name_ur' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_ur' => 'nullable|string',
            'instructor_ids' => 'nullable|array',
            'instructor_ids.*' => 'exists:instructors,id',
            'fee' => 'nullable|numeric',
            'price_display' => 'nullable|string|max:255',
            'currency' => 'nullable|string|max:10',
            'duration_value' => 'nullable|integer',
            'duration_type' => 'nullable|string|in:days,weeks,months,years',
            'enrollments' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = [
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
                'ur' => $request->name_ur,
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
                'ur' => $request->description_ur,
            ],
            'slug' => Str::slug($request->name_en),
            'fee' => $request->fee,
            'currency' => $request->currency,
            'price_display' => $request->price_display,
            'duration_value' => $request->duration_value,
            'duration_type' => $request->duration_type,
            'enrollments' => $request->enrollments,
        ];

        // Image replacement
        if ($request->hasFile('image')) {
            if ($course->image && Storage::disk('public')->exists($course->image)) {
                Storage::disk('public')->delete($course->image);
            }
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        $course->update($data);

        if ($request->filled('instructor_ids')) {
            $course->instructors()->sync($request->instructor_ids);
        }

        return redirect()->route('lms.courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        if ($course->image && Storage::disk('public')->exists($course->image)) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->route('lms.courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
