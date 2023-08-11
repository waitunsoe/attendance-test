<div>
    <ul class="list-group">
        <li>
            <a href="{{ route('course.index') }}" class="list-group-item list-group-item-action">Course</a>
        </li>
        @foreach (App\Models\Course::all() as $course)
            <li>
                <a href="{{ route('attendance.index', $course->slug) }}" class="list-group-item list-group-item-action">
                    {{ $course->name }} attendance
                </a>
            </li>
        @endforeach
        <li>
            <a href="{{ route('teacher.index') }}" class="list-group-item list-group-item-action">Teacher</a>
        </li>
        <li>
            <a href="{{ route('student.index') }}" class="list-group-item list-group-item-action">Student</a>
        </li>
    </ul>

</div>
