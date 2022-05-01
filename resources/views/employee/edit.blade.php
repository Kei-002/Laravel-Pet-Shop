@extends('layouts.base')
@section('body')
<div class="container">
    <h2>Edit Employee</h2>
    
    {{ Form::model($employee,['route' => ['employee.update',$employee->id],'method'=>'PUT', 'files' => true]) }}
    <!-- {{csrf_field()}} if di gagamit ng larative collective need toh--> 
    <!-- {{ method_field('PUT') }} -->
    
    <div class="form-group"> 
        <label for="lname" class="control-label">Last name</label>
        <!-- <input type="text" class="form-control " id="lname" name="lname" ></text> -->
        {{ Form::text('lname',null,array('class'=>'form-control','id'=>'lname')) }}
        @if($errors->has('lname'))
        <small>{{ $errors->first('lname') }}</small>
        @endif 
    </div> 
    <div class="form-group"> 
        <label for="fname" class="control-label">First Name</label>
        <!-- <input type="text" class="form-control " id="fname" name="fname" > -->
        {{ Form::text('fname',null,array('class'=>'form-control','id'=>'fname')) }}
        @if($errors->has('fname'))
        <small>{{ $errors->first('fname') }}</small>
        @endif 
    </div>
    <div class="form-group"> 
        <label for="phone" class="control-label">Phone</label>
        <!-- <input type="text" class="form-control" id="phone" name="phone"> -->
        {{ Form::text('phone',null,array('class'=>'form-control','id'=>'phone')) }}
        @if($errors->has('phone'))
        <small>{{ $errors->first('phone') }}</small>
        @endif 
    </div>

    <div class="form-group">
        <label for="image" class="control-label">Employee Photo</label>
        <input type="file" class="form-control" id="image" name="image" >
        <img src="{{ asset('images/employee/'.$employee->img_path) }}" class="rounded float-left img-fluid " width="200" height="200" alt="...">

        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div> 

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>     
</div>
{!! Form::close() !!} 
@endsection