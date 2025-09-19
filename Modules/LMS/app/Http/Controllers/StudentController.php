<?php

namespace Modules\LMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Modules\LMS\Models\Student;
use Modules\LMS\Models\Course;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('courses')->latest()->paginate(10);
        return view('lms::students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('lms::students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'name_ur' => 'nullable|string|max:255',
            'bio_en' => 'nullable|string',
            'bio_ar' => 'nullable|string',
            'bio_ur' => 'nullable|string',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'photo' => 'nullable|image|max:2048',
            'course_ids' => 'nullable|array',
            'course_ids.*' => 'exists:courses,id',
        ]);

        $sid = substr(preg_replace('/[^0-9]/', '', $request->phone), -4)
            . '25'
            . str_pad(Student::count() + 1, 2, '0', STR_PAD_LEFT);

        $photoPath = $request->hasFile('photo') 
            ? $request->file('photo')->store('students', 'public') 
            : null;

        $student = Student::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
                'ur' => $request->name_ur,
            ],
            'bio' => [
                'en' => $request->bio_en,
                'ar' => $request->bio_ar,
                'ur' => $request->bio_ur,
            ],
            'email' => $request->email,
            'phone' => $request->phone,
            'photo' => $photoPath,
            'reference' => $sid,
        ]);

        $student->courses()->sync($request->course_ids);

        // Email the SID
        Mail::raw("Your Student ID (SID) is: {$sid}", function ($message) use ($student) {
            $message->to($student->email)->subject('Your Student ID');
        });

        return redirect()->route('lms.students.index')->with('success', 'Student created successfully.');
    }

    public function show($id)
{
    $student = Student::with('courses')->findOrFail($id);
    $courses = Course::all(); // fetch all courses for the modal
    return view('lms::students.show', compact('student', 'courses'));
}


public function assignCourses(Request $request, Student $student)
{
    // Sync selected courses with the student
    $student->courses()->sync($request->courses ?? []);

    return redirect()->back()->with('success', 'Courses updated successfully.');
}




    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::all();
        return view('lms::students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'name_ur' => 'nullable|string|max:255',
            'bio_en' => 'nullable|string',
            'bio_ar' => 'nullable|string',
            'bio_ur' => 'nullable|string',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:20',
            'photo' => 'nullable|image|max:2048',
            'course_ids' => 'nullable|array',
            'course_ids.*' => 'exists:courses,id',
        ]);

        $data = [
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
                'ur' => $request->name_ur,
            ],
            'bio' => [
                'en' => $request->bio_en,
                'ar' => $request->bio_ar,
                'ur' => $request->bio_ur,
            ],
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        if ($request->hasFile('photo')) {
            if ($student->photo && Storage::disk('public')->exists($student->photo)) {
                Storage::disk('public')->delete($student->photo);
            }

            $data['photo'] = $request->file('photo')->store('students', 'public');
        }

        $student->update($data);
        $student->courses()->sync($request->course_ids);

        return redirect()->route('lms.students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->photo && Storage::disk('public')->exists($student->photo)) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()->route('lms.students.index')->with('success', 'Student deleted successfully.');
    }
}
