@extends('layouts.app')
@section('content')
    <div>
        <h1>Add Teacher</h1>

        <form action="{{ route('teacher.store') }}" method="post" class="w-75" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Profile Photo: </label>
                <input type="file" name="teacher_photo" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Name: </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone: </label>
                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number">
            </div>
            <div class="mb-3">
                <label class="form-label">Email: </label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <button class="btn btn-primary w-25">Save</button>
        </form>
    </div>
@endsection
