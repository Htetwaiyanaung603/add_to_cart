@extends('layout.master')

@section('title', 'Product Create')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
           <form action="{{ route('productAdd')}}" method="POST">
               @csrf
               <div class="form-group">
                   <label>Product Name</label>
                   <input type="text" name="name" class="form-control"> 
               </div>

                <div class="form-group">
                    <label>Product Image</label>
                    <input type="text" name="photo" class="form-control"> 
                </div>

                <div class="form-group">
                    <label>Product Price</label>
                    <input type="number" name="price" class="form-control"> 
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" style="resize: none" cols="30" rows="10"></textarea> 
                </div>

                <div class="form-group">
                    <a href="{{ route('productIndex')}}"><button class="btn btn-dark">Back</button></a>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
           </form>
        </div>
      </div>
    </div>
  </div>
    
@endsection