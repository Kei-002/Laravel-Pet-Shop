@extends('layouts.base')
@section('title')
	laravel shopping cart
@endsection
@section('content')

    @foreach ($services->chunk(3) as $service)
        <div class="row">
            @foreach ($service as $serv)
                <div class="card mx-3 my-3" style="width: 18rem;">
                    <img class="card-img-top mt-2" src="{{ asset('images/groom/'.$serv->img_path) }}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{ $serv->groom_name }}</h5>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Price: <strong>{{ $serv->price }}</strong></li>
                
                    </ul>
                    <div class="card-body">
                    <a href="{{ route('item.addToCart', ['id'=>$serv->id]) }}" class="card-link">Add to cart</a>
                    <a href="{{ route('item.view',$serv->id) }}" class="card-link">View service</a>
                    </div>
                </div>       
            @endforeach
        </div>
    @endforeach
@endsection
