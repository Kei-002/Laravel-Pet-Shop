<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ACME Pet Clinic</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Square+Peg&display=swap" rel="stylesheet"> 
    <link href="{{ asset('css/test.css') }}" rel="stylesheet">  
    @include('layouts.app')
    {{-- @include('layouts.test') --}}
    {{-- @include('layouts.header')
     --}}
</head>
<body>
    @yield('assets')
   
    @yield('body')

    <div class="container">
        @yield('content')
    </div>
</body>
</html>