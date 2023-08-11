<div class="container">
    <h1>Edit Attendance</h1>
    <form action="{{ route('attendance.update', $courseId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="student_id">Student:</label>
            <select name="student_id" id="student_id" class="form-control">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $attendance->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $attendance->date }}">
        </div>
        <div class="form-group">
            <label for="present">Present:</label>
            <select name="present" id="present" class="form-control">
                <option value="1" {{ $attendance->present ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$attendance->present ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
