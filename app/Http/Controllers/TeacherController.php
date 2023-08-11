<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all()
            ->map(function ($teacher) {
                $teacher->teacher_photo = asset(Storage::url('teacherPhotos/' . $teacher->teacher_photo));
                return $teacher;
            });
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;

        if ($request->hasFile('teacher_photo')) {
            $teacherPhoto = $request->file('teacher_photo');
            $newName = 'teacher-photo-' . time() . '.' . $teacherPhoto->extension();
            $teacherPhoto->storeAs('teacherPhotos', $newName, 'public');
            $teacher->teacher_photo = $newName;
        }
        $teacher->save();
        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
