@extends('layouts.base')
@section('body')
<div class="container">
<!-- {{dump($errors)}} -->
<ul class="errors">
    @foreach($errors->all() as $message)
    <li><p>{{ $message }}</p></li>
    @endforeach
</ul>
<h2>Create new Employee</h2>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
      @if (count($errors) > 0)
          <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                  <p>{{ $error }}</p>
              @endforeach
          </div>
      @endif
      <form class="" action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group"> 
              <label for="fname" class="control-label">First name</label>
              <input type="text" class="form-control " id="fname" name="fname" value="{{old('fname')}}">
              @if($errors->has('fname'))
                  <small>{{ $errors->first('fname') }}</small>
              @endif 
          </div> 

          <div class="form-group"> 
              <label for="lname" class="control-label">Last name</label>
              <input type="text" class="form-control " id="lname" name="lname" value="{{old('lname')}}">
              @if($errors->has('lname'))
                  <small>{{ $errors->first('lname') }}</small>
              @endif 
          </div> 

          <div class="form-group"> 
              <label for="phone" class="control-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
              @if($errors->has('phone'))
                  <small>{{ $errors->first('phone') }}</small>
              @endif 
          </div>

          <div class="form-group">
              <label for="email">Email: </label>
              <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
              @if($errors->has('email'))
                  <small>{{ $errors->first('email') }}</small>
              @endif 
          </div>
          <div class="form-group">
              <label for="password">Password: </label>
              <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}">
              @if($errors->has('password'))
                  <small>{{ $errors->first('password') }}</small>
              @endif 
          </div>

          <div class="form-group">
              <label for="image" class="control-label">Employee Photo</label>
              <input type="file" class="form-control" id="image" name="image" >
              @error('image')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div> 
          
          {{-- <div>
              <button type="submit" class="btn btn-primary">Sign Up</button> --}}
              {{-- <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a> --}}
              {{-- </div>      --}}
          
              <input type="submit" value="Save" class="btn btn-primary">
       </form>
  </div>
</div>
{{-- <form method="post" action="{{route('employee.store')}}" enctype="multipart/form-data"  >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
    <div class="form-group"> 
        <label for="lname" class="control-label">Last name</label>
    <input type="text" class="form-control " id="lname" name="lname" value="{{old('lname')}}">
    @if($errors->has('lname'))
      <small>{{ $errors->first('lname') }}</small>
    @endif 
  </div> 
  <div class="form-group"> 
    <label for="fname" class="control-label">First Name</label>
    <input type="text" class="form-control " id="fname" name="fname" value="{{old('fname')}}">
    @if($errors->has('fname'))
      <small>{{ $errors->first('fname') }}</small>
    @endif 
  </div>

    
  <div class="form-group"> 
    <label for="phone" class="control-label">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
    @if($errors->has('phone'))
      <small>{{ $errors->first('phone') }}</small>
    @endif 
  </div>

  <div class="form-group">
    <label for="image" class="control-label">Employee Photo</label>
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
</form>  --}}
@endsection