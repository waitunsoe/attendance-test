@extends('layouts.app')
@section('content')
    <div>
        <h1>Add Attendance</h1>

        <form action="{{ route('attendance.store', $courseSlug) }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label">Date:</label>
                        <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="form-label">Day:</label>
                        <input type="number" min="1" name="day" class="form-control" placeholder="What Day!">
                    </div>
                </div>
            </div>
            <table class="table w-75 table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>
                                <select name="status[{{ $student->id }}]" class="form-select">
                                    <option value="PRESENT">PRESENT</option>
                                    <option value="ABSENT">ABSENT</option>
                                    <option value="ABSENT WITH PERMISSION">ABSENT WITH PERMISSION</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary w-25">Save</button>
        </form>
    </div>
@endsection
