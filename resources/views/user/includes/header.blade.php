<header class="header">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header_content d-flex flex-row align-items-center justify-content-start">
                    <div class="logo">
                        <a href="{{ route('welcome') }}"><img src="{{ asset('assets/user/images/logo.png') }}" alt=""></a>
                    </div>
                    <nav class="main_nav">
                        <ul>
                            <li class="active"><a href="index.html">Home</a></li>
                            <li><a href="about.html">About us</a></li>
                            <li><a href="properties.html">Properties</a></li>
                            <li><a href="news.html">News</a></li>
                            {{-- <li><a href="{{ route('project_detailes') }}">projectDetailes</a></li> --}}
                            @if(auth()->user())
                                <li>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                          Dropdown
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                          <li style="width: 100%">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                                @csrf
                                                <input type="submit" value="Log Out" class="dropdown-item">
                                            </form>
                                          </li>
                                          <li style="width: 100%"><button class="dropdown-item" type="button">Another action</button></li>
                                          <li style="width: 100%"><button class="dropdown-item" type="button">Something else here</button></li>
                                        </ul>
                                      </div>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}">Log in</a></li>
                                <li><a href="{{ route('register') }}">Regster</a></li>
                            @endif
                            {{-- <li>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                      Setting
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: #2d2d2d">
                                      <li><a class="dropdown-item" href="#">Profile</a></li>
                                      <li>
                                          <form action="{{ route('logout') }}" class="dropdown-item" method="POST">
                                              @csrf
                                            <input type="submit" value="Log out">
                                          </form>
                                      </li>
                                    </ul>
                                  </div>
                            </li> --}}
                        </ul>
                    </nav>
                    <div class="phone_num ml-auto">
                        <div class="phone_num_inner">
                            <img src="{{ asset('assets/user/images/phone.png') }}" alt=""><span>652-345 3222 11</span>
                        </div>
                    </div>
                    <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</header>