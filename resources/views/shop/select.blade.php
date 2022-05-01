@extends('layouts.base')
@section('title')
    Laravel Shopping Cart
@endsection
@section('content')
    @if(Session::has('cart'))

    <br>
        <h1 align="center">Select Owner</h1>
    <br>
    
    <form method="get" action="{{route('item.shoppingCart')}}">
        <div class="form-group"> 
            <label for="customers">Owner Name:</label>
                <select name="customer_id" id="customers" class="form-select">
                  @foreach($customers as $customer)
                     <option value="{{$customer->id}}">{{$customer->fname}} {{$customer->lname}} </option>
                  @endforeach
                </select>
          </div>   
          <div class="input-group mb-3">
             <button type="submit" class="btn btn-primary">Select</button>
          </div>
    </form>
    @else
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No Items in Cart!</h2>
        </div>
    </div>
    @endif
@endsection