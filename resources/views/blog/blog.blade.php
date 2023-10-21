@extends('blog.layout')

@section('blog')

    <main class="wrapper">
        <!-- background Start -->
        <section
                class="aai-breadcrumb"
                style="
          background: url({{asset("storage/images/keyboard.jpg")}}) no-repeat center
            center/cover;
        "
        >
        </section>
        <!-- Breadcrumb End -->

        <!-- Blog  Start -->
        <section class="aai-blog-posts pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-xl-8">
                        @foreach($articles as $index=>$article)
{{--                            @php--}}
{{--                            dd($article);--}}
{{--                            @endphp--}}
                            <article
                                    class="aai-post-wrapper"
                                    data-aos="fade-up"
                                    data-aos-delay="50"
                            >
                                <div class="aai-post-item">
                                    <a
                                            href="{{route('show_article',['locale'=>$locale,'article' => $article])}}"
                                            class="aai-post-thumb-wrapper d-block"
                                            target="_blank"
                                    >
                                        @foreach($article->media as $img)
                                            <img
                                                    src="{{$img->getUrl()}}"
                                                    class="img-fluid aai-post-thumb"
                                                    alt=""
                                            />
                                        @endforeach
                                    </a>

                                    <div class="aai-post-content">
                                        <div class="aai-post-meta d-flex flex-wrap gap-3">
                                                <a href="{{route('article_user',[$article->users->slug,'locale' => $locale])}}" class="d-flex align-items-center gap-2">
                                                    <i class="fa-regular fa-user"></i>
                                                    <button  style="all: unset;" class= "d-flex align-items-center gap-2 hover">{{$article->users->name}}</button>
                                                </a>
                                                <a style="cursor: pointer" class="d-flex align-items-center gap-2 hover"> </a>
                                            <form action="{{route('like')}} " method='post'>
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="id" value="{{$article->id}}">
                                                <button class="d-flex align-items-center gap-2" style="all: unset;"><span class="material-symbols-outlined  @if (auth()->user() && auth()->user()->hasLiked($article)) liked @endif " >thumb_up</span></button>

                                            </form>

                                            <a class="d-flex align-items-center gap-2"><span>({{$article->likers()->count()}})</span></a>
                                            <form class="d-flex align-items-center gap-2" action="{{route('follow')}} " method='post'>
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="id" value="{{$article->users->id}}">
                                                <a class="d-flex align-items-center gap-2 hover"> <button  style="all: unset;" class= "d-flex align-items-center gap-2 hover"> @if (auth()->user() && auth()->user()->isFollowing($article->users))Unfollow @else Follow  @endif </button></a>
                                            </form>

                                            <a href="#" class="d-flex align-items-center gap-2">
                                                <i class="fa-regular fa-clock"></i>
                                                <span>{{$article->created_at}}</span> </a
                                            ><a href="#" class="d-flex align-items-center gap-2">
                                                <i class="fa-regular fa-folder"></i>
                                                @foreach($article->categories as $index =>$category)
                                                  <a class="d-flex align-items-center gap-2 hover" href="{{route('show_category',['locale' => $locale,$category->slug])}}"><span>{{$category->name}}</span></a>
                                                @endforeach
                                            </a>
                                        </div>
                                        <h3 class="aai-post-title">
                                            <a class="d-flex align-items-center gap-2" href="blog-details.html">
                                                {{$article->title}}
                                            </a>
                                        </h3>

                                        <div class="tinymce-content">
                                            {!! $article->body !!}
                                        </div>

                                        <a
                                                href="{{route('show_article',['locale' => $locale,'article' => $article])}}"
                                                class="aai-post-readmore d-flex align-items-center gap-2"
                                        >
                                            <span>Read More</span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>

                                    </div>
                                </div>

                            </article>
                        @endforeach
                            {{ $articles->links() }}
                    </div>

                    <div class="col-lg-5 col-xl-4">
                        <aside class="aai-blog-sidebar">
                            <!-- Search -->
                            <div class="aai-sidebar-widget mb-4">
                                <form action="{{route('search')}}" method="get">

                                    <div class="aai-sidebar-search-from">
                                        <input
                                                type="text"
                                                class="form-control shadow-none"
                                                placeholder="Search Here"
                                                name="query"
                                        />
                                        <button class="aai-sidebar-search-button">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- Recent Post -->
                            @include('blog.components.recent_posts');
                            <!--  Post Category -->
                            <div class="aai-sidebar-widget">
                                <h3 class="aai-sidebar-title">Category</h3>
                                <ul class="mt-4 aai-blog-lists d-flex flex-column gap-3">
                                    <li class="aai-blog-list-item">
                                        <a href="#" class="d-flex align-items-center gap-3">
                                            <i class="fa-solid fa-angle-right"></i>
                                            <span>AI Revolution(4)</span>
                                        </a>
                                    </li>
                                    <li class="aai-blog-list-item">
                                        <a href="#" class="d-flex align-items-center gap-3">
                                            <i class="fa-solid fa-angle-right"></i>
                                            <span>New AI(2)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </aside>

                    </div>
                </div>

            </div>
        </section>
        <!-- Blog  End -->
    </main>

    <!-- Footer Start -->
    <footer
            class="aai-footer pt-120"
            style="
        background: url('assets/img/bg/footer-bg.jpeg') no-repeat center
          center/cover;
      "
    >
        <div class="container">
            <div class="aai-footer-support">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="aai-support-info d-flex align-items-center">
                            <div>
                                <img src="assets/img/icons/headset.svg" alt=""/>
                            </div>
                            <div class="aai-support-contact">
                                <p class="aai-support-text mb-1">
                                    Have a question? Call us 24/7
                                </p>
                                <a
                                        href="tel:+1707797
              0462"
                                        class="aai-support-number"
                                >
                                    +1 (707) 797 0462</a
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="aai-newsletter">
                            <form>
                                <div class="position-relative">
                                    <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your email"
                                    />
                                    <button class="aai-newsletter-btn">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="aai-footer-navigation-widgets py-80">
                <div class="row">
                    <div
                            class="col-xl-4 col-lg-4 col-md-12"
                            data-aos="fade-right"
                            data-aos-duration="1500"
                            data-aos-delay="50"
                    >
                        <div class="aai-footer-info">
                            <a href="" class="aai-footer-logo">
                                <img src="assets/img/logo/logo-f.svg" alt=""/>
                            </a>
                            <p class="aai-footer-desc">
                                We provide one-stop solutions for all <br/>
                                IT items; your bliss is just a click away. Star Tech trusts in
                                quality client
                            </p>
                            <div class="aai-social-links d-flex">
                                <a href="http://" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="http://" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-twitter"></i
                                    ></a>
                                <a href="http://" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-instagram"></i
                                    ></a>
                                <a href="http://" target="_blank" rel="noopener noreferrer"
                                ><i class="fa-brands fa-youtube"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12 mt-5 mt-lg-0">
                        <div class="row">
                            <div
                                    class="col-xl-4 col-lg-4 col-md-4 mb-5 mb-lg-0"
                                    data-aos="fade-up"
                                    data-aos-delay="100"
                                    data-aos-duration="1500"
                            >
                                <nav class="aai-footer-nav">
                                    <h3 class="aai-footer-nav-title">Links</h3>
                                    <ul class="aai-footer-nav-list">
                                        <li class="aai-footer-nav-list-item">
                                            <a href="index.html" class="aai-footer-nav-link"> Home </a>
                                        </li>
                                        <li class="aai-footer-nav-list-item">
                                            <a href="services.html" class="aai-footer-nav-link"> Service </a>
                                        </li>
                                        <li class="aai-footer-nav-list-item">
                                            <a href="prices.html" class="aai-footer-nav-link"> Pricing </a>
                                        </li>
                                        <li class="aai-footer-nav-list-item">
                                            <a href="about.html" class="aai-footer-nav-link"> About US </a>
                                        </li>
                                        <li class="aai-footer-nav-list-item">
                                            <a href="features.html" class="aai-footer-nav-link"> Feature </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div
                                    class="col-xl-4 col-lg-4 col-md-4 mb-5 mb-lg-0"
                                    data-aos="fade-up"
                                    data-aos-delay="300"
                                    data-aos-duration="1500"
                            >
                                <nav class="aai-footer-nav">
                                    <h3 class="aai-footer-nav-title">Artworks</h3>
                                    <ul class="aai-footer-nav-list">
                                        <li class="aai-footer-nav-list-item">
                                            <a href="services.html" class="aai-footer-nav-link"> 3D Artworks </a>
                                        </li>
                                        <li class="aai-footer-nav-list-item">
                                            <a href="services.html" class="aai-footer-nav-link"> Photography </a>
                                        </li>
                                        <li class="aai-footer-nav-list-item">
                                            <a href="services.html" class="aai-footer-nav-link">
                                                PriFlat Illustrationcing
                                            </a>
                                        </li>
                                        <li class="aai-footer-nav-list-item">
                                            <a href="services.html" class="aai-footer-nav-link">Intro Videos </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div
                                    class="col-xl-4 col-lg-4 col-md-4"
                                    data-aos="fade-up"
                                    data-aos-delay="500"
                                    data-aos-duration="1500"
                            >
                                <nav class="aai-footer-nav">
                                    <h3 class="aai-footer-nav-title">Community</h3>
                                    <ul class="aai-footer-nav-list">
                                        <li class="aai-footer-nav-list-item">
                                            <a href="services.html" class="aai-footer-nav-link">
                                                Global Partners
                                            </a>
                                        </li>
                                        <li class="aai-footer-nav-list-item">
                                            <a href="about.html" class="aai-footer-nav-link"> Forum </a>
                                        </li>
                                        <li class="aai-footer-nav-list-item">
                                            <a href="services.html" class="aai-footer-nav-link">
                                                Virtual World
                                            </a>
                                        </li>
                                        <li class="aai-footer-nav-list-item">
                                            <a href="about.html" class="aai-footer-nav-link"> Community </a>
                                        </li>
                                        <li class="aai-footer-nav-list-item">
                                            <a href="services.html" class="aai-footer-nav-link">
                                                Brand Assets
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="aai-footer-copyright text-center">
                <p class="aai-copyright-text">Copyright @2023 Aai inc.</p>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all elements with a class of 'tinymce-content'
            let containers = document.querySelectorAll('.tinymce-content');

            // Loop through all the containers
            containers.forEach(function (container) {
                // Find all <p> elements within the current container
                let paragraphs = container.getElementsByTagName('p');

                // Loop through the <p> elements and add the desired class to each
                for (let i = 0; i < paragraphs.length; i++) {
                    paragraphs[i].classList.add('aai-post-details-text', 'mb-4');
                }
            });
        });
    </script>
@endsection