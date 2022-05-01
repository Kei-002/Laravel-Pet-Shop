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
        background-color: #877799;
    }

</style>
<div class="container">
      
<div class="row">
<div class="col-md-12">
    <div class="card mt-4 border-dark mb-3">
      <div class="card-header">
          <h4 id="hh">Search Transaction</h4>
        </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{route('transaction.search')}}" method="GET">
                        <div class="input-group mb-3">
                          <input placeholder="Search Customer Name" type="text" name="search" class="form-control" placeholder="Search data" required>
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
            @if($transactions->isNotEmpty())
                @foreach($transactions as $transaction)
                    <h3 id="hh">Transaction History of <strong style="color: #DAA520;">{{$transaction->lname}} {{$transaction->fname}}</strong></h3>
                    @break  
                 @endforeach 
            @else 
                <h3 id="hh">Transaction History</h3>  
            @endif  
          </div>

              <div class="card-body text-dark">
                                  <a href="{{ route('item.index') }}" class="btn btn-outline-primary a-btn-slide-text">
                                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                          <span><strong>ADD</strong></span>            
                                  </a>
                                  <br>
                                  <br>
                  <table class="table border">
                      <thead class="thead-dark">
                          <tr>
                              <th style="display:none">Transaction ID:</th>
                              <th>Pet Name:</th>
                              <th>Service bought:</th>
                              <th>Transaction Date: </th>
                              <th>Quantity: </th>
                              <th>Total:</th>
                              <th>Status:</th>
                              <th>Edit: </th>
                              <th>Delete: </th>
                          </tr>
                      </thead>
                      <tbody>
                       
                    @if($transactions->isNotEmpty())
                        @foreach($transactions as $transaction)
                    <tr>
                        <td hidden>{{$transaction->tlID}}</td>
                        <td>{{ $transaction->pet_name}}</td>
                        <td>{{ $transaction->groom_name}}</td>
                        <td>{{ $transaction-> transacation_date}}</td>
                        <td>{{ $transaction-> quantity}}</td>
                        <td>{{ ($transaction-> quantity) * ($transaction-> price) }}</td>
                        <td>{{ $transaction-> status }}</td>
                        <td align="center"><a href="{{ route('transactions.edit',$transaction->tlID) }}"><i class="fa-regular fa-pen-to-square" aria-hidden="true" style="font-size:24px" ></a></i></td>
                        {!! Form::open(array('route' => array('transactions.destroy', $transaction->tlID),
                            'method'=>'DELETE')) !!}
                            <td align="center"><button ><i class="fa-solid fa-trash-can" style="font-size:24px; color:red" ></i></button></td>
                            {!! Form::close() !!}
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