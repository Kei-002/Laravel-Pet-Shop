@extends('layouts.base')
@section('body')
<div class="container">
<!-- {{dump($errors)}} -->
<ul class="errors">
    @foreach($errors->all() as $message)
    <li><p>{{ $message }}</p></li>
    @endforeach
</ul>
<h2>Create new Groom Service</h2>
<form method="post" action="{{route('groomservice.store')}}" enctype="multipart/form-data"  >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
    <div class="form-group"> 
        <label for="groom_name" class="control-label">Groom Service Name</label>
    <input type="text" class="form-control " id="groom_name" name="groom_name" value="{{old('groom_name')}}">
    @if($errors->has('groom_name'))
      <small>{{ $errors->first('groom_name') }}</small>
    @endif 
  </div> 
  <div class="form-group"> 
    <label for="price" class="control-label">Price</label>
    <input type="text" class="form-control " id="price" name="price" value="{{old('price')}}">
    @if($errors->has('price'))
      <small>{{ $errors->first('price') }}</small>
    @endif 
  </div>

    

  <div class="form-group">
    <label for="image" class="control-label">Service Photo</label>
    <input type="file" class="form-control" id="image" name="image" >
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div> 

  <div>
<button type="submit" class="btn btn-primary">Save</button>
  <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
</form> 
@endsection