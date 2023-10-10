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
                            <span><a class="nav-link" href="{{route('show_category',[ $index+1])}}">{{$category->name}}( {{ $category->articles_count }})</a></span>
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
                        <a href="{{route('login')}}">Login</a>
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