@extends('layout.master')

@section('title', 'Product All')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
            <a href="{{ route('productCreate') }}"><button class="btn btn-outline-info"><i class="fas fa-plus"></i> Add</button></a>
            <table class="table table-striped table-hover">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th></th>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($products as $product)
                    <tr>
                        <td>@php echo $i; $i++; @endphp</td>
                        <td>{{ $product->name}}</td>
                        <td>
                            <img src="{{$product->photo}}" alt="Not Found" class="img-size-50">
                        </td>
                        <td>{{ $product->price}}</td>
                        <th>{{ $product->description }}</th>
                        <td>
                            <a href="{{ route('productEdit', $product->id )}}"><button class="btn btn-success"><i class="far fa-edit"></i> Edit</button></a>
                            <a href="{{ route('productDelete', $product->id )}}"><button class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
    
@endsection