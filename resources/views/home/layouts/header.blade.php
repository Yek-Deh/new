<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="">
          <span>
              @if(Route::has('login'))
                  @auth
                      {{ Auth::user()->name }}
                  @else
                      Giftos
                  @endauth
              @endif

          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
                <li class="nav-item active">
                    @if(Route::has('login'))
                        @auth
                            <a class="nav-link " href="{{url('/dashboard')}}">Home <span class="sr-only ">(current)</span></a>
                        @else
                            <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        @endauth
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('shop')}}">
                        Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('why')}}">
                        Why Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('testimonial')}}">
                        Testimonial
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('contact')}}">Contact Us</a>
                </li>
            </ul>
            <div class="user_option">

                @if(Route::has('login'))
                    @auth
                        <a href="{{url('my_orders')}}">
                            My Orders
                        </a>
                        <a href="{{url('my_cart')}}">
                            <i class="fa fa-shopping-bag" aria-hidden="true"> [{{$count}}]</i>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" value="logout" class="btn-outline-primary rounded">
                        </form>
                    @else

                        <a href="{{url('/login')}}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                Login
              </span>
                        </a>
                        <a href="{{url('/register')}}">
                            <i class="fa fa-vcard" aria-hidden="true"></i>
                            <span>
                Register
              </span>
                        </a>
                    @endauth
                @endif


                {{--                <form class="form-inline ">--}}
                {{--                    <button class="btn nav_search-btn" type="submit">--}}{{--            serach btn--}}
                {{--                        <i class="fa fa-search" aria-hidden="true"></i>--}}
                {{--                    </button>--}}
                {{--                </form>--}}
            </div>
        </div>
    </nav>
</header>
