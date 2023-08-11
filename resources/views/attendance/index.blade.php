@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Attendance Records</h1>
        <div class="row">

            <div class="col">
                <table class="table table-bordered ">
                    <thead class="align-middle">
                        <tr>
                            <th>Name</th>

                            @php $previousDay = null; @endphp
                            @foreach ($attendances as $attendance)
                                @if ($attendance->day != $previousDay)
                                    <td>
                                        <span class=" text-muted small">{{ $attendance->date }}</span>
                                        <p class="mb-0">Day {{ $attendance->day }}</p>
                                    </td>
                                @endif
                                @php $previousDay = $attendance->day; @endphp
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                @php $previousDay = null; @endphp
                                @foreach ($student->attendances as $attendance)
                                    @if ($attendance->day != $previousDay)
                                        <td>{{ $attendance->status }}</td>
                                    @endif
                                    @php $previousDay = $attendance->day; @endphp
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            @php $previousDay = null; @endphp
                            @foreach ($attendances as $attendance)
                                @if ($attendance->day != $previousDay)
                                    <th>Day {{ $attendance->day }}</th>
                                @endif
                                @php $previousDay = $attendance->day; @endphp
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @php $previousDay = null; @endphp
                        @foreach ($attendances as $attendance)
                            @if ($attendance->day != $previousDay)
                                <tr></tr>
                                @php $previousDay = $attendance->day; @endphp
                            @endif
                            <td>{{ $attendance->status }}</td>
                        @endforeach
                    </tbody>

                </table>
            </div> --}}



        </div>
        <a href="{{ route('attendance.create', $courseSlug) }}" class="btn btn-success">Add Attendance</a>
    </div>
@endsection
