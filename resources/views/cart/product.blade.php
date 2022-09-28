@extends('layout.master')

@section('title', 'Product All')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
           <div class="row">
           @foreach ($products as $product)
           <div class="col-md-3">
            <div class="card">
              <div class="card-title">
                <img src="{{$product->photo}}" alt="Not Found" style="width: 100%; height: 200px">
              </div>
              <div class="card-body text-center">
                <h4 class="font-weight-bold">{{$product->name}}</h4>
                <p class="text-info font-weight-bold">${{$product->price}}</p>
              </div>
              <div class="card-footer text-center">
                <a href="{{ route('addToCart', $product->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart"></i> add-to-cart</a>
              </div>
            </div>
          </div>
           @endforeach
           </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection