@extends('layouts.base')
@section('body')
<div class="container my-5">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div>
                        <img class="rounded float-left" src="{{ asset('images/groom/'.$service->img_path) }}" height="300px" width="500px">
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$service->groom_name}}</h3>
                    <div class="rating">
                        <span class="review-no">41 reviews</span>
                    </div>
                    <p class="product-description">{{$service->description}}.</p>
                    <h4 class="price">₱ {{$service->price}}</h4>
                    <div>
                        <a href="{{ route('item.addToCart', ['id'=>$service->id]) }}" class="btn btn-outline-info" role="button" aria-pressed="true">add to cart</a>
                        
                           {{-- button Modal Start --}}
                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal{{$service->id}}" href="{{route('comments.create')}}">
                        Leave a review
                    </button>
                      
                      <!-- Modal -->
                      <form method="post" action="{{route('comments.store')}}" enctype="multipart/form-data"  >
                        {{ csrf_field() }} 
                      <div class="modal fade" id="exampleModal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group"> 
                                  <label for="customer_name">Guest Name:</label>
                                  <input type="text" id="customer_name" name="customer_name"><br><br>
                                    <input type="hidden" id="service_id" name="service_id" value="{{$service->id}}">

                                  </div>  
                                  <label for="comment">Comment:</label>
                                  <div>
                                    <textarea name="comment" cols="40" rows="5"></textarea>
                                </div> 
                                
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- Modal End --}}
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div>
        <h1>User Comments</h1>
    </div>

    @foreach($allcomment as $comment)
    <div class="container my-5">
        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">{{$comment->name}}</h4>
                <p>{{$comment->comment}}</p>
                <ul class="list-unstyled list-inline media-detail pull-left">
                <li><i class="fa fa-calendar"></i>{{date('d-m-Y', strtotime($comment->created_at))}}</li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach



</div>
 @endsection