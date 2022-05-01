@extends('layouts.header')

<!-- Modal -->

<div class="modal fade" id="exampleModal{{$pet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pet Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <img src="{{ asset('images/pet/'.$pet->img_path) }}" class="rounded float-left img-fluid max-width: 100% height: auto" alt="...">
            <p>Pet Name: <strong>{{$pet->pet_name}} </strong></p>
            <p>Age: <strong>{{$pet->age}} </strong> years old</p>
            <p>Owner: <strong>{{$pet->fname}} {{$pet->lname}} </strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
 
  {{-- Modal End --}}