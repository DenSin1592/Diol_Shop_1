@extends('shop_layout')

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">{{$product->title}}</h1>
        <p class="lead"><span>{{$product->description}}</span></p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col product_image" style="background-image: url('{{asset($product->img)}}');"></div>
            <div class="col">
                @if($product->availability)
                    <h2 class="card-title pricing-card-title margin-vert-30 availability">В наличии</h2>
                @else
                    <h2 class="card-title pricing-card-title margin-vert-30 no_availability">Нет в наличии</h2>
                @endif
                <h1 class="card-title pricing-card-title margin-vert-30">${{$product->price}}</h1>
                <button type="button" class="btn btn-lg btn-block btn-outline-primary margin-vert-30">В корзину</button>
            </div>
        </div>
    </div>
@endsection
