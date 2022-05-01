@extends('layouts.base')

@section('body')
    <div class="container">
        <a href="{{route('pet.create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <span><strong>ADD</strong></span>            
    </a>
   
  
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Pet ID</th>
                <th>Pet Name</th>
                <th>Actions</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pets as $pet)
            <tr>
                <td>{{$pet->id}}</td>
                <td>{{$pet->pet_name}}</td>
                <td>
                    {{-- button Modal Start --}}
                   
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$pet->id}}" href="{{route('pet.show',$pet->id)}} data-backdrop="false">
                        Show Info
                    </button>
                    @include('pet.modal.show')
                    {{-- Modal Start --}}
                    {{-- <div class="modal fade" id="exampleModal{{$pet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                          {{-- </div>
                        </div>
                      </div>
                    </div> --}}
                    {{-- Modal End --}}
                      
                </td>
                {{-- <td align="center"><a href="{{ route('customer.edit',$customer->id) }}"><i class="fa-regular fa-pen-to-square" aria-hidden="true" style="font-size:24px" ></a></i>
                <td align="center"><a href="{{ route('customer.destroy',$customer->id) }}"><i class="fa-solid fa-trash-can" aria-hidden="true" style="font-size:24px" ></a></i> --}}
                @if($pet->deleted_at)
                
                    <td align="center"><i class="fa-regular fa-pen-to-square" aria-hidden="true" style="font-size:24px; color:gray"></i></td>
                    <td align="center"><i class="fa-solid fa-trash-can" style="font-size:24px; color:gray" ></i></td>
                    <td align="center"><a href="{{ route('pet.restore',$pet->id) }}" ><i class="fa fa-undo" style="font-size:24px; color:darkseagreen" ></i></a></td>
                    
                    
                @else
                    <td align="center"><a href="{{ route('pet.edit',$pet->id) }}"><i class="fa-regular fa-pen-to-square" aria-hidden="true" style="font-size:24px" ></a></i></td>
                    {!! Form::open(array('route' => array('pet.destroy', $pet->id),
                    'method'=>'DELETE')) !!}
                    <td align="center"><button ><i class="fa-solid fa-trash-can" style="font-size:24px; color:red" ></i></button></td>
                    {!! Form::close() !!}
                    {{-- <i class="fa fa-undo" style="font-size:24px; color:gray" ></i> --}}
                @endif
                <!-- <td align="center">
            {{-- {!! Form ::open(array('route' => array('customer.destroy', $customer->id),'method'=>'DELETE')) !!} --}}
           <button ><i class="fa-solid fa-trash-can" style="font-size:24px; color:red" ></i></button>
         </td>
         {{-- <td align="center"><a href="{{ route('customer.restore',$customer->id) }}" ><i class="fa fa-undo" style="font-size:24px; color:red" ></i></a></td> --> --}} -->
            </tr> 
            <!-- Button trigger modal -->
            
            @endforeach
            </table>
        </div>
        
        <div>{{$pets->links()}}</div>
        
</div>
@endsection