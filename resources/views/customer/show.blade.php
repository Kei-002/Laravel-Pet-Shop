{{-- @extends('layouts.app') --}}
@extends('layouts.header')
@section('content')
<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <h1>Customer Profile</h1>
        <td><img src="{{ asset('images/'.$customer->img_path) }}" width="200" height="200"/></td>
        <div class="form-group mb-3">
            <label for="">Title - </label>
            <td>{{$customer->title}}</td>
        </div>
        <div class="form-group mb-3">
            <label for="">First Name </label>
            <td>{{$customer->fname}}</td>
        </div>
        <div class="form-group mb-3">
            <label for="">Last Name </label>
            <td>{{$customer->lname}}</td>
        </div>
        <div class="form-group mb-3">
            <label for="">Town </label>
            <td>{{$customer->Town}}</td>
        </div>
        <div class="form-group mb-3">
            <label for="">Zipcode </label>
            <td>{{$customer->zipcode}}</td>
        </div>
        <div class="form-group mb-3">
            <label for="">Phone Number</label>
            <td>{{$customer->phone}}</td>
        </div>
    </div>
    <a class="btn btn-info" href="{{route('customer.index')}}" role="button">Return to Home</a>
    
</div>