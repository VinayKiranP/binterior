<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        {{-- <h1 class="logo"><a href="{{url('/')}}"><img src="{{ asset('assets/img/'.$company->image) }}" width="200px" alt=""></a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="/" class="logo pt-2"><img src="{{ asset('assets/img/'.$company->logo) }}" alt="logo" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto {{Request::is('/')? 'active' : ''}}" href="{{url('/')}}">Home</a></li>
                <li><a class="nav-link scrollto {{Route::is('/about')? 'active' : ''}}" href="{{route('orderUser.create')}}">About</a></li>
                <li><a class="nav-link scrollto {{Route::is('/services')? 'active' : ''}}" href="{{route('orderUser.create')}}">Services</a></li>
                <li><a class="nav-link scrollto {{Route::is('/gallery')? 'active' : ''}}" href="{{route('orderUser.create')}}">Gallery</a></li>
                <li><a class="nav-link scrollto {{Route::is('/blog')? 'active' : ''}}" href="{{route('orderUser.create')}}">Blog</a></li>
                <li><a class="nav-link scrollto {{Route::is('orderUser.create')? 'active' : ''}}" href="{{route('orderUser.create')}}">Order</a></li>
                
                @guest
                    <li><a class="nav-link {{Request::is('login') || Request::is('register') ? 'active' : ''}}" href="{{url('login')}}">Login</a></li>
                    <!-- <li><a class="nav-link {{Request::is('register')? 'active' : ''}}" href="{{url('register')}}">Registration</a></li> -->
                @endguest
                
                
                @auth
                    <li class="dropdown {{Request::is('order-user')? 'active' : ''}}"><a href="#"><span>Hi, {{auth()->user()->name}}</span><i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{route('orderUser.index')}}">My Project</a></li>
                            <li><a href="{{route('profile.editUser')}}">Edit Account</a></li>
                            <li>
                                <a  href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>


