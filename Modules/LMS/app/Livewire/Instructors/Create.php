<?php

namespace Modules\LMS\Livewire\Instructors;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Modules\LMS\Models\Instructor;

class Create extends Component
{
    use WithFileUploads;

    public $instructor = [
        'name' => [
            'en' => '',
            'ar' => '',
            'ur' => '',
        ],
        'email' => '',
        'bio' => [
            'en' => '',
        ],
    ];

    public $photo;

    public function store()
    {
        $this->validate([
            'instructor.name.en' => 'required|string|max:255',
            'instructor.email' => 'nullable|email|unique:instructors,email',
            'instructor.bio.en' => 'nullable|string|max:2000',
            'photo' => 'nullable|image|max:2048',
        ]);

        $newInstructor = new Instructor();
        $newInstructor->name = $this->instructor['name'];
        $newInstructor->email = $this->instructor['email'];
        $newInstructor->bio = $this->instructor['bio'];

        if ($this->photo) {
            $newInstructor->photo = $this->photo->store('instructors', 'public');
        }

        $newInstructor->save();

        session()->flash('message', 'Instructor created successfully.');
        return redirect()->route('lms.instructors.index');
    }

    public function render()
    {
        return view('lms::livewire.instructors.create');
    }
}
