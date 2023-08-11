@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Course List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->slug }}</td>
                        <td>{{ $course->created_at }}</td>
                        <td>
                            <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('course.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <a href="{{ route('attendance.create') }}" class="btn btn-success">Add Attendance</a> --}}
    </div>
@endsection
