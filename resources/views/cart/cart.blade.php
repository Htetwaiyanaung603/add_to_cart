@extends('layout.master')

@section('title', 'Cart')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
            
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
                    @php 
                        $i = 1;
                        $total = 0;
                    @endphp
                    @foreach (session('carts') as $id => $detail)

                    @php
                        $total += $detail['price'] * $detail['quantity'];
                    @endphp

                    <tr data-id={{ $id }}>
                        <td>@php echo $i; $i++; @endphp</td>
                        <td>{{ $detail['name']}}</td>
                        <td>
                            <img src="{{$detail['photo']}}" alt="Not Found" class="img-size-50">
                        </td>
                        <td>{{ $detail['price']}}</td>
                        <th>
                            <input type="number" value="{{ $detail['quantity'] }}" class="cart-update quantity">
                        </th>
                        <td>
                            <button class="btn btn-danger cart-remove"><i class="fas fa-trash"></i> Delete</button>
                        </td>
                    </tr>
                    @endforeach

                    <tfoot>
                        <tr>
                            <td>Total : ${{$total}}
                                <a href="{{ route('cartStore')}}" class="btn btn-info"> <i class="fa fa-shopping-cart"> Add</i></a>
                            </td>
                        </tr>
                    </tfoot>
                    
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.js""></script>
  <script>
    $(".cart-update").change(function(e){
        e.preventDefault();

        var ele = $(this);
        
        var id = ele.parents("tr").attr("data-id");
        var quantity = ele.parents("tr").find('.quantity').val();
        
        $.ajax({
            url : '{{ route('cartUpdate') }}',
            method : 'patch',
            data : {
                _token : '{{ csrf_token() }}',
                id : id,
                quantity : quantity,
            },
            success : function(response) {
                window.location.reload();
            }
        })
    })

    $(".cart-remove").click(function(e){
        e.preventDefault();

        var ele = $(this);

        var id  = ele.parents('tr').attr('data-id');

        $.ajax({
            url : '{{ route('cartRemove')}}',
            method : 'delete',
            data : {
                _token : '{{ csrf_token()}}',
                id : id,
            },
            success : function(response) {
                window.location.reload();
            }
        })
    })
  </script>
    
@endsection