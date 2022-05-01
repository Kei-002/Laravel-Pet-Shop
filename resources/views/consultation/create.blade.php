@extends('layouts.base')
@section('body')
<div class="container">
<!-- {{dump($errors)}} -->
<ul class="errors">
    @foreach($errors->all() as $message)
    <li><p>{{ $message }}</p></li>
    @endforeach
</ul>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
</div>
@endif
<h2>Pet Consultation</h2>
<form method="post" action="{{route('consultation.store')}}" enctype="multipart/form-data"  >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group"> 
      <label for="pet">Pet Name:</label>
          <select name="pet_id" id="pets" class="form-select">
            @foreach($pets as $pet)
               <option value="{{$pet->id}}">{{$pet->pet_name}}</option>
            @endforeach
          </select>
    </div>   

    <div class="form-group"> 
      <label for="disease">Disease:</label>
          <select name="disease_id" id="diseases" class="form-select">
            @foreach($diseases as $disease)
               <option value="{{$disease->id}}">{{$disease->disease_name}}</option>
            @endforeach
          </select>
    </div>

  <div class="form-group"> 
    <label for="fee" class="control-label">Consultation Fee:</label>
    <input type="text" class="form-control " id="fee" name="fee" value="{{old('fee')}}">
    @if($errors->has('fee'))
      <small>{{ $errors->first('fee') }}</small>
    @endif 
  </div>
  
  
  <div class="form-group"> 
      <label for="employee">Veterenarian Name:</label>
          <select name="employee_id" id="employees" class="form-select">
            @foreach($employees as $employee)
               <option value="{{$employee->id}}">{{$employee->fname}} {{$employee->lname}}</option>
            @endforeach
          </select>
    </div>
 
  <div class="form-group"> 
    <label for="comments" class="control-label">Comment</label>
    <input type="text" class="form-control" id="comments" name="comments" value="{{old('comments')}}">
    @if($errors->has('comments'))
      <small>{{ $errors->first('comments') }}</small>
    @endif 
  </div>

  <div>
    <button type="submit" class="btn btn-primary">Save</button>

    @if (Auth::check())
      <a href="{{ route('consultation.search') }}" class="btn btn-default" role="button">Go to history</a>
    @else
      
    @endif
      
  </div>    
   
</div>
</form> 
@endsection