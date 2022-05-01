@extends('layouts.base')
@section('body')
<div class="container">
    <h2>Edit Pet Information</h2>
    
    {{ Form::model($pets,['route' => ['pet.update',$pets->id],'method'=>'PUT', 'files' => true]) }}
    <!-- {{csrf_field()}} if di gagamit ng larative collective need toh--> 
    <!-- {{ method_field('PUT') }} -->
    <div class="form-group">
        <label for="title" class="control-label">Pet Name: </label>
        {{ Form::text('pet_name',null,array('class'=>'form-control','id'=>'pet_name')) }}
        @if($errors->has('pet_name'))
        <small>{{ $errors->first('pet_name') }}</small>
        @endif 
    </div> 
    <div class="form-group">
        <label for="title" class="control-label">Age: </label>
        {{ Form::text('age',null,array('class'=>'form-control','id'=>'age')) }}
        @if($errors->has('age'))
        <small>{{ $errors->first('age') }}</small>
        @endif 
    </div> 

    <div class="form-group">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="customers">Owner Name:</label>
            {!! Form::select('customer_id',$customers, $pets->customer_id,['class' => 'form-control form-select', 'customer_id']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="image" class="control-label">Pet Photo</label>
        <input type="file" class="form-control" id="image" name="image" >
        <img src="{{ asset('images/pet/'.$pets->img_path) }}" class="rounded float-left img-fluid " width="200" height="200" alt="...">

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