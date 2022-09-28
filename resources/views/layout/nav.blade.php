<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-shopping-cart"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
      </li> --}}
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-shopping-cart" style="font-size: 20px"></i>
          <span class="badge badge-danger navbar-badge">{{ count((array)session('carts'))}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        @php $total = 0; @endphp
        @foreach ((array)session('carts') as $id => $detail)
        @php 
          $total += $detail['price'] * $detail['quantity'];
        @endphp
        @endforeach

          @if(session('carts'))

          

          <div>
            <h4 class="text-center text-info">Total : ${{ $total}}</h4>
          </div>
          
          @foreach ((array)session('carts') as $id => $detail)
            
         
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{$detail['photo']}}" alt="User Avatar" class="img-size-50 mr-3">
              <div class="media-body">
                <h4>
                  {{$detail['name']}}
                </h4>
               <p class="text-sm text-info">${{$detail['price']}}
                 <span class="text-sm text-muted pl-2">Quantity : {{$detail['quantity']}}</span>
               </p>
                
              </div>
            </div>
            <!-- Message End -->
          </a>
          @endforeach
          @endif
          <div class="dropdown-divider"></div>
          <a href="{{ route('cart')}}" class="dropdown-item dropdown-footer bg-primary">View All</a>
        </li>
    </ul> 
  </nav>