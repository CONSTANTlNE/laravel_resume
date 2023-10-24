@extends('blog.layout')
{{--@php--}}
{{--dd($article)--}}
{{-- @endphp--}}
@section('show_article')

    <!-- Menu Start -->

    <!-- Menu End -->
    <main class="wrapper">
      <!-- Breadcrumb Start -->
      <section
        class="aai-breadcrumb"
        style="
          background: url('assets/img/bg/bread-crumb-bg.jpeg') no-repeat center
            center/cover;
        "
      >
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-6">
              <div class="text-center d-flex flex-column gap-3">
                <h2 class="section-title">
                  {{$article->title}}
                </h2>
                <ul
                  class="aai-breadcrumb-nav d-flex align-items-center justify-content-center"
                >
                  <li>
                    <a
                      href="{{route('blog')}}"
                      class="aai-breadcrumb-link text-decoration-underline"
                      >Home</a
                    >
                  </li>

                </ul>
                <div
                  class="aai-post-meta justify-content-center d-flex flex-wrap gap-3"
                >
                  <a href="#" class="d-flex align-items-center gap-2">
                    <i class="fa-regular fa-user"></i>
                    <span>{{$article->users->name}}</span>
                  </a>
                  <a href="#" class="d-flex align-items-center gap-2">
                    <i class="fa-regular fa-clock"></i>
                    <span>{{$article->created_at}}</span> </a
                  ><a href="#" class="d-flex align-items-center gap-2">

                    @foreach ( $article->categories as $category)
                      <span>{{ $category->name }}</span>
                    @endforeach

                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Breadcrumb End -->

      <!-- Blog Detailss Start -->
      <section class="aai-blog-posts pb-120">
        <div class="container">
          <div class="row g-4">
            <div class="col-lg-7 col-xl-8">
              <div class="aai-post-details-wrapper">
                <!-- Details Content -->
                <div class="aai-post-details-top mb-4">
                  <div>

                    @foreach($article->media as $media)
                      <img
                              src="{{$media->getUrl()}}"
                              class="img-fluid aai-blog-details-thumb mb-5"
                              alt=""
                      />
                    @endforeach

                      <div id="tinymce-content">
                        {!! $article->body !!}
                      </div>

                  </div>
                </div>
                <!-- Social Links -->
                <div class="d-flex align-items-center gap-3 mb-5">
                  <h3 class="aai-post-social-share">Social:</h3>
                  <div class="aai-post-social-links d-flex gap-1">
                    <a class="facebook" data-social="facebook" href="#"
                      ><i class="fa-brands fa-facebook"></i
                    ></a>
                    <a class="twitter" data-social="twitter" href="#"
                      ><i class="fa-brands fa-twitter"></i
                    ></a>
                    <a class="pinterest" data-social="pinterest" href="#"
                      ><i class="fa-brands fa-pinterest-p"></i
                    ></a>
                    <a class="linkedin" data-social="linkedin" href="#"
                      ><i class="fa-brands fa-linkedin-in"></i
                    ></a>
                  </div>
                </div>
                <!-- Comment Form -->
                <div class="aai-comment-form mt-4">
                  <h3 class="aai-post-comment-note">Leave a Reply</h3>
                  <p class="aai-post-email-note">
                    Your email address will not be published.
                  </p>
                  <form class="mt-4">
                    <div class="aai-comment-input mb-3">
                      <label class="aai-comment-form-label">Comment</label>
                      <textarea class="form-control shadow-none"></textarea>
                    </div>
                    <div class="aai-comment-input mb-3">
                      <label class="aai-comment-form-label">Name</label>
                      <input type="text" class="form-control shadow-none" />
                    </div>
                    <div class="aai-comment-input mb-3">
                      <label class="aai-comment-form-label">Email</label>
                      <input type="text" class="form-control shadow-none" />
                    </div>
                    <div class="aai-comment-input mb-3">
                      <label class="aai-comment-form-label">Website</label>
                      <input type="text" class="form-control shadow-none" />
                    </div>
                    <div
                      class="aai-comment-input d-flex align-items-center gap-3"
                    >
                      <input type="checkbox" />
                      <label class="aai-comment-form-label m-0"
                        >Save my name, email, and website in this browser for
                        the next time I comment.</label
                      >
                    </div>
                    <div class="mt-4">
                      <button class="aai-btn btn-pill-solid">
                        Post Comment
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-xl-4">
              <aside class="aai-blog-sidebar">
                <!-- Search -->
                <div class="aai-sidebar-widget mb-4">
                  <form action="">
                    <div class="aai-sidebar-search-from">
                      <input
                        type="text"
                        class="form-control shadow-none"
                        placeholder="Search Here"
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
                  <ul class="mt-4 aai-blog-lists d-flex flex-column gap-2">

                    <li class="aai-blog-list-item">
                      <a href="#" class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-angle-right"></i>
                        <span>AI Revolution(4)</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </section>
      <!-- Blog Detailss  End -->
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
                  <img src="assets/img/icons/headset.svg" alt="" />
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
                  <img src="assets/img/logo/logo-f.svg" alt="" />
                </a>
                <p class="aai-footer-desc">
                  We provide one-stop solutions for all <br />
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
    <script>
      // Wait for the document to be ready
      document.addEventListener('DOMContentLoaded', function () {
        // Get the container element
        let container = document.getElementById('tinymce-content');

        // Find all <p> elements within the container
        let paragraphs = container.getElementsByTagName('p');

        // Loop through the <p> elements and add the desired class to each
        for (let i = 0; i < paragraphs.length; i++) {
          paragraphs[i].classList.add('aai-post-details-text', 'mb-4');
        }
      });
    </script>

@endsection