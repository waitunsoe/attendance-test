<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index($courseSlug)
    {
        $course = Course::where('slug', $courseSlug)->firstOrFail();
        $attendances = Attendance::where('course_id', $course->id)->get();
        $students = Student::where('course_id', $course->id)->get();

        return view('attendance.index', compact('attendances', 'students'), ['courseSlug' => $courseSlug]);
    }

    public function create($courseSlug)
    {
        $course = Course::where('slug', $courseSlug)->firstOrFail();
        $students = Student::where('course_id', $course->id)->get();
        return view('attendance.create', ['students' => $students, 'courseSlug' => $courseSlug]);
    }

    public function store(Request $request, $courseSlug)
    {
        $course = Course::where('slug', $courseSlug)->firstOrFail();

        $attendances = [];

        foreach ($request->status as $key => $value) {
            $attendances[] = [
                'teacher_id' => $course->teacher_id,
                'course_id' => $course->id,
                'student_id' => $key,
                'date' => $request->date,
                'day' => $request->day,
                'status' => $value,
            ];
        }
        $attendances = Attendance::insert($attendances);

        return redirect()->route('attendance.index', $courseSlug)
            ->with('success', 'Attendance recorded successfully');
    }

    public function edit(Attendance $attendance, $courseSlug)
    {
        $students = Student::all();
        return view('attendance.edit', compact('attendance', 'students'), ['courseSlug' => $courseSlug]);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'student_id' => 'required',
            'date' => 'required|date',
            'present' => 'required|boolean',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendance.index')
            ->with('success', 'Attendance updated successfully');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendance.index')
            ->with('success', 'Attendance deleted successfully');
    }
}
