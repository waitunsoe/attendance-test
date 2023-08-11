@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Teacher List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>
                            <img src="{{ $teacher->teacher_photo }}" class="w-50 h-50 rounded">
                        </td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->phone }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('teacher.create') }}" class="btn btn-success">Add Teacher</a>
    </div>
@endsection
