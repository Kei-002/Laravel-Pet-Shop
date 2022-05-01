@extends('layouts.base')
@section('title')
    Laravel Shopping Cart
@endsection
@section('content')
    @if(Session::has('cart'))

    <br>
        <h1 align="center">View Cart</h1>
    <br>
    <form method="get" action="{{route('checkout')}}">
    <div class="cart-view-table-back">
            <table width="100%"  cellpadding="6" cellspacing="0">
                <thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Pet</th><th colspan=2>Actions</th></tr></thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td> {{$item['qty']}}</td>
                        <td> {{$item['item']['groom_name']}}</td>
                        <td> {{$item['item']['price']}}</td>
                        <td>{{ $item['price'] }}</td>
                        {{-- {{-- <td>{{$consultation-> fee}}</td> --}}
                        <td>
                        
                            <div class="form-group"> 
                                {{-- <label for="pets">Pet Name:</label> --}}
                                    <select name="pet_id{{$item['item']['id']}}" id="pets" class="form-select">
                                      @foreach($pets as $pet)  
                                         <option value="{{$pet->id}}">{{$pet->pet_name}} </option>
                                      @endforeach
                                    </select>
                              </div>   

                        </td>
                        {{-- <td>{{$consultation-> comments}}</td> --}} 
                        <td><a href="{{ route('item.reduceByOne',['id'=>$item['item']['id']]) }}" type="button" class="btn btn-warning ml-2">Reduce By 1</a></td>
                        <td><a href="{{ route('item.remove',['id'=>$item['item']['id']]) }}" type="button" class="btn btn-danger">Remove</a></td>
                        {{-- <td><li><a href="{{ route('item.reduceByOne',['id'=>$item['item']['id']]) }}">Reduce By 1</a></li></td>
                        <td><li><a href="{{ route('item.remove',['id'=>$item['item']['id']]) }}">Reduce All</a></li></td> --}}
                    </tr>    
                    
                    @endforeach
            
                </tbody>
            </table>
        <input type="hidden" name="return_url" value="" />
    </div>

    <div class="form-group">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <strong>Total: {{ $totalPrice }}</strong>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            {{-- <button type="button" class="btn btn-success">Checkout</button> --}}
            {{-- <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a> --}}
            <button type="submit" class="btn btn-warning">Checkout</button>
        </div>
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