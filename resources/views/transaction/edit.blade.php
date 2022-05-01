@extends('layouts.base')
@section('body')

<div class="container">
    <form method="post" action="{{route('transactions.update', $transactions->tlID)}}" enctype="multipart/form-data"  >
        {{ method_field('PUT') }}
        {{ csrf_field() }}
    <h2>Edit Transaction</h2>
    <div class="form-group">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="customers">Pet Name:</label>
            {!! Form::select('pet_id',$pets, $transactions->pet_id,['class' => 'form-control form-select', 'pet_id']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="service">Service bought:</label>
            {!! Form::select('service_id',$groomservices, $transactions->g_id,['class' => 'form-control form-select', 'g_id']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="form-group col-md-4">   
        <label for="date">Date bought:</label>
        <input class="form-control" type="date" value="{{ $transactions->transacation_date}}" name="transacation_date">
    </div>

    <div class="form-group">
        <div class="form-group col-md-4">   
        <label for="quantity">Quantity </label>
        <input class="form-control" type="text" value="{{ $transactions->quantity}}" name="quantity">
    </div>

    <div class="form-group">
        <div class="form-group col-md-4">   
        <label for="quantity">Status </label>
        <input class="form-control" type="text" value="{{ $transactions->status}}" name="status">
    </div>

   
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</form>
</div>     

@endsection