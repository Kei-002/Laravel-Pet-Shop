@extends('layouts.base')
@section('body')
    
  
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
</div>
@endif



<style>
    body {
        background-color: #778899;
    }

</style>
<div class="container">
      
<div class="row">
<div class="col-md-12">
    <div class="card mt-4 border-dark mb-3">
      <div class="card-header">
          <h4 id="hh">Search Pet</h4>
        </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{route('consultation.search')}}" method="GET">
                        <div class="input-group mb-3">
                          <input placeholder="Search Pet's Name" type="text" name="search" class="form-control" placeholder="Search data" required>
                           <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>

                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-12">
          <div class="card mt-4 border-dark">
          <div class="card-header">
            @if($consultations->isNotEmpty())
                @foreach($consultations as $consultation)
                    <h3 id="hh">Pet Consultation History of <strong style="color: #DAA520;">{{$consultation->pet_name}}</strong></h3>
                    @break  
                 @endforeach 
            @else 
                <h3 id="hh">Pet Consultation History</h3>  
            @endif  
          </div>
              <div class="card-body text-dark">
                                  <a href="{{ route('consultation.create') }}" class="btn btn-outline-primary a-btn-slide-text">
                                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                          <span><strong>ADD</strong></span>            
                                  </a>
                                  <br>
                                  <br>
                  <table class="table border">
                      <thead class="thead-dark">
                          <tr>
                              <th style="display:none">Consultation ID:</th>
                              <th>Disease:</th>
                              <th>Treated by:</th>
                              <th>Consulted on: </th>
                              <th>Consultation Fee:</th>
                              <th>Comments:</th>
                              {{-- <th>Edit: </th>
                              <th>Delete: </th> --}}
                          </tr>
                      </thead>
                      <tbody>
                       
                    @if($consultations->isNotEmpty())
                        @foreach($consultations as $consultation)
                    <tr>
                        <td>{{$consultation->disease_name}}</td>
                        <td>Dr. {{$consultation->fname}} {{$consultation->lname}}</td>
                        <td>{{$consultation-> created_at}}</td>
                        <td>{{$consultation-> fee}}</td>
                        <td>{{$consultation-> comments}}</td>
                    </tr> 
                        @endforeach
                    @else 
                        <td>
                            <h2>No records found</h2>
                        </td>
                    @endif
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
</div>
@endsection