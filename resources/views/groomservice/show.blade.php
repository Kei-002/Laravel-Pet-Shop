{{-- @extends('layouts.app') --}}
@extends('layouts.header')
@section('content')
<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <h1>Groom Service Information</h1>
        <td><img src="{{ asset('images/groom/'.$groom->img_path) }}" width="200" height="200"/></td>
        <div class="form-group mb-3">
            <label for="fname">Service Name: </label>
            <td><strong>{{$groom->groom_name}}</strong></td>
        </div>
        <div class="form-group mb-3">
            <label for="lname">Price: </label>
            <td><strong>{{$groom->price}}</strong></td>
        </div>
        <div>
            <a class="btn btn-info" href="{{route('employee.index')}}" role="button">Return to Home</a>

        </div>
    </div>

    
    
</div>