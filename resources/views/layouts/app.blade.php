<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance</title>
    @vite('resources/css/app.scss')
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                @include('layouts.sidebar')
            </div>
            <div class="col-8">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
