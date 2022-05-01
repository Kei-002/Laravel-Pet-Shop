@extends('layouts.base')
@section('content')
    {{-- <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>user profile</h1>
            <h2>{{Auth::user()->email}}</h2>
            <h2>{{$employee->lname}}</h2>
            <h2>{{$employee->fname}}</h2>
        </div>
     </div> --}}
     <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <h1>User Profile</h1>
            <td><img src="{{ asset('images/employee/'.$employee->img_path) }}" width="200" height="200"/></td>
            <div class="form-group mb-3">
                <label for="fname">First Name: </label>
                <td><strong>{{$employee->fname}}</strong></td>
            </div>
            <div class="form-group mb-3">
                <label for="lname">Last Name: </label>
                <td><strong>{{$employee->lname}}</strong></td>
            </div>
            <div class="form-group mb-3">
                <label for="">Phone Number: </label>
                <td><strong>{{$employee->phone}}</strong></td>
            </div>
            
    
        <a class="btn btn-info" href="{{route('employee.index')}}" role="button">Return to Home</a>
        
    </div>
@endsection   
