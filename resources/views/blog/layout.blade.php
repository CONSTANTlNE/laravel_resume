<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        Constantines Blog
    </title>
    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/aos.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/fontawesome-all.min.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/bootstrap.min.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/glightbox-min.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/swiper-bundle.min.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/style.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/custom/CSS/google_icons.css")}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
@include('blog.components.header_nav')

@yield('blog')
@yield('show_article')



<!-- All JS -->
<script src="{{asset("assets/blog/assets/js/typed.js")}}"></script>
<script src="{{asset("assets/blog/assets/js/aos.js")}}"></script>
<script src="{{asset("assets/blog/assets/js/swiper-bundle.min.js")}}"></script>
<script src="{{asset("assets/blog/assets/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/blog/assets/js/glightbox-min.js")}}"></script>
<script src="{{asset("assets/blog/assets/js/app.js")}}"></script>
</body>
</html>
