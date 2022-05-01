@extends('layouts.base')
@section('body')
<div class="container">
<!-- {{dump($errors)}} -->
<ul class="errors">
    @foreach($errors->all() as $message)
    <li><p>{{ $message }}</p></li>
    @endforeach
</ul>
<h2>Create New Pet</h2>
<form method="post" action="{{route('pet.store')}}" enctype="multipart/form-data"  >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="pet_name" class="control-label">Pet Name</label>
        <input type="text" class="form-control" id="pet_name" name="pet_name"  value="{{old('pet_name')}}">
        @if($errors->has('pet_name'))
      <small>{{ $errors->first('pet_name') }}</small>
    @endif 
    </div>
    <div class="form-group"> 
        <label for="age" class="control-label">Age</label>
    <input type="text" class="form-control " id="age" name="age" value="{{old('age')}}">
    @if($errors->has('age'))
      <small>{{ $errors->first('age') }}</small>
    @endif 
  </div> 
  
  <div class="form-group">
    <label for="image" class="control-label">Pet Photo</label>
    <input type="file" class="form-control" id="image" name="image" >
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
  
  </div>  
  <div class="form-group"> 
    <label for="customers">Owner Name:</label>
        <select name="customer_id" id="customers" class="form-select">
          @foreach($customers as $customer)
             <option value="{{$customer->id}}">{{$customer->fname}} {{$customer->lname}} </option>
          @endforeach
        </select>
  </div>   
  <button type="submit" class="btn btn-primary">Save</button>
  <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</form> 
@endsection