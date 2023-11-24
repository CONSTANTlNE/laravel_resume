<header class="header-primary">
    <div class="container">
        <nav class="navbar navbar-expand-xl justify-content-between">

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <span><a class="nav-link" href="{{route('blog')}}">All</a></span>
                    </li>
                    @foreach($categories as $index =>$category)

                        <li class="nav-item">
                            <span><a class="nav-link" href="{{route('show_category',[$index+1])}}">{{$category->name}}( {{ $category->articles_count }})</a></span>
                        </li>
                    @endforeach
                </ul>

                <div class="d-flex align-items-center gap-4 mt-4">
                    <div
                            class="align-items-center aai-signup-in-links d-flex d-lg-none"
                    >
                        @auth
                            <a href="{{route('admin')}} " class="aai-gradient-outline-btn">Admin</a>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" style="display: inline-block;
    padding: 0;
    margin: 0;
    border: none;
    background: none;
    color: inherit;
    font: inherit;
    text-align: inherit;
    cursor: pointer;">
                                    <a class="aai-gradient-outline-btn">Log Out</a>
                                </button>
                            </form>
                        @endauth
                        @guest
                            <a href="{{route('login')}}">Login</a>
                            <a href="{{route('register')}}" class="aai-gradient-outline-btn"
                            >Signup
                            </a>
                        @endguest
                    </div>
                </div>

            </div>



                <ul style="margin-right: 25px;">
                    <li class="nav-item dropdown language-dropdown">
                        <form id="language-form" method="POST" action="{{ route('set-locale') }}">
                            @csrf
                            @method('POST')
                            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(App::getLocale()=='en')
                                    <span class="fi fi-gb"></span>
                                @else
                                    <span class="fi fi-ge"></span>
                                @endif
                            </a>
                            <section class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                                <a class="dropdown-item d-flex gap-1" href="javascript:void(0);"
                                   onclick="submitForm('ge')">
                                    <span class="fi fi-ge "></span>ქართული
                                </a>
                                <a class="dropdown-item d-flex gap-1" href="javascript:void(0);"
                                   onclick="submitForm('en')">
                                    <span class="fi fi-gb"></span>English
                                </a>
                            </section>
                        </form>
                    </li>
                </ul>

            {{--          ==============--}}
            <div class="navbar-right d-flex align-items-center gap-4">

                <div
                        class="align-items-center aai-signup-in-links d-none d-lg-flex"
                >
                    @auth
                        <a href="{{route('admin')}} " class="aai-gradient-outline-btn">Admin</a>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" style="display: inline-block;
    padding: 0;
    margin: 0;
    border: none;
    background: none;
    color: inherit;
    font: inherit;
    text-align: inherit;
    cursor: pointer;">
                                <a class="aai-gradient-outline-btn">Log Out</a>
                            </button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{route('login')}}" class="aai-gradient-outline-btn">Login</a>
                        <a href="{{route('register')}}" class="aai-gradient-outline-btn"
                        >Signup
                        </a>
                    @endguest
                </div>
                <button
                        class="navbar-toggler d-block d-xl-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                >
                    <span></span>
                </button>
            </div>
        </nav>

    </div>
</header>