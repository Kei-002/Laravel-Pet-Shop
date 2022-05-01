@extends('layouts.base')
@section('body')
<div class="container">
    <h2>Edit Service</h2>
    
    {{ Form::model($groom,['route' => ['groomservice.update',$groom->id],'method'=>'PUT', 'files' => true]) }}
    <!-- {{csrf_field()}} if di gagamit ng larative collective need toh--> 
    <!-- {{ method_field('PUT') }} -->
    
    <div class="form-group"> 
        <label for="groom_name" class="control-label">Groom Name</label>
        <!-- <input type="text" class="form-control " id="lname" name="lname" ></text> -->
        {{ Form::text('groom_name',null,array('class'=>'form-control','id'=>'groom_name')) }}
        @if($errors->has('lname'))
        <small>{{ $errors->first('lname') }}</small>
        @endif 
    </div> 
    <div class="form-group"> 
        <label for="price" class="control-label">Price</label>
        <!-- <input type="text" class="form-control " id="fname" name="fname" > -->
        {{ Form::text('price',null,array('class'=>'form-control','id'=>'price')) }}
        @if($errors->has('price'))
        <small>{{ $errors->first('price') }}</small>
        @endif 
    </div>

    <div class="form-group">
        <label for="image" class="control-label">Service Photo</label>
        <input type="file" class="form-control" id="image" name="image" >
        <img src="{{ asset('images/groom/'.$groom->img_path) }}" class="rounded float-left img-fluid " width="200" height="200" alt="...">

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