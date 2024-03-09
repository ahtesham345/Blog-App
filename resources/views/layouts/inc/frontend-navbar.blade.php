<style>

</style>
<div class="global-navbar">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-none d-sm-none d-md-inline">
                <img src="{{asset('assets/images/logo.jpg')}}" alt="">
            </div>
            <div class="col-md-8 m-auto">
                <div class="border text-center p-2">
                    <h5>Advertise Here</h5>

                </div>
            </div>
            <!-- <div class="col-md-4 m-auto d-flex">
            @guest
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    @endguest

            @auth
        <p class="text-center me-4 my-auto">Welcome, {{ Auth::user()->name }}</p>
        <form action="{{ route('logout') }}" method="POST" >
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    @endauth
           </div> -->

        </div>
    </div>
    </div>
    <div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
  <div class="container">
    <a href="" class="d-inline d-sm-inline d-md-none">
    <img src="{{asset('assets/images/logo.jpg')}}" height="50px" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        @php
            $categories = App\Models\category::where('navbar_status','0')->where('status','0')->get();
        @endphp
        @foreach ($categories as $catitem )
        <li class="nav-item">
          <a class="nav-link" href="{{url('tutorial/'.$catitem->slug)}}">{{$catitem->name}}</a>
        </li>
        @endforeach
        <li class="nav-item">
        @guest
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    @endguest
    @auth
    <!-- <p class="text-center me-4 my-auto">Welcome, {{ Auth::user()->name }}</p> -->
    <form action="{{ route('logout') }}" method="POST" >
        @csrf
        <button type="submit" class="btn btn-danger m-auto">Logout</button>
    </form>
@endauth
        </li>
      </ul>

    </div>
  </div>
</nav>
</div>

