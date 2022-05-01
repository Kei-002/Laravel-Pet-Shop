{{-- @extends('layouts.app') --}}
@extends('layouts.header')
@section('content')
<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <h1>Employee Profile</h1>
        <td><img src="{{ asset('images/emp/'.$employee->img_path) }}" width="200" height="200"/></td>
        <div class="form-group mb-3">
            <label for="fname">First Name: </label>
            <td><strong>{{$employee->fname}}</strong></td>
        </div>
        <div class="form-group mb-3">
            <label for="lname">Last Name: </label>
            <td><strong>{{$employee->lname}}</strong></td>
        </div>
        <div class="form-group mb-3">
            <label for="">Phone Number</label>
            <td><strong>{{$employee->phone}}</strong></td>
            
            
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="phone" value="{{$employee->phone}}">
            </div>
          </div>
    </div>

    <a class="btn btn-info" href="{{route('employee.index')}}" role="button">Return to Home</a>
    
</div>