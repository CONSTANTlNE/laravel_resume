<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  @yield('metas')
    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/aos.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/fontawesome-all.min.css")}}" />
{{--    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/bootstrap.min.css")}}" />--}}
    <link href="{{asset('assets/bootstrap/src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/glightbox-min.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/swiper-bundle.min.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/blog/assets/css/style.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/custom/CSS/google_icons.css")}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link href="{{asset('assets/bootstrap/layouts/vertical-dark-menu/css/dark/structure-mod.css')}}"
          rel="stylesheet" type="text/css"/>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.11.0/css/flag-icons.min.css"
    />
    <style>
        .dropdown-menu.show{
            display: block!important;
        }
    </style>
</head>
<body>
@include('blog.components.header_nav')

@yield('blog')
@yield('show_article')



<!-- All JS -->
<script src="{{asset("assets/blog/assets/js/typed.js")}}"></script>
<script src="{{asset("assets/blog/assets/js/aos.js")}}"></script>
<script src="{{asset("assets/blog/assets/js/swiper-bundle.min.js")}}"></script>
{{--<script src="{{asset("assets/blog/assets/js/bootstrap.bundle.min.js")}}"></script>--}}
<script src="{{asset("assets/blog/assets/js/glightbox-min.js")}}"></script>
<script src="{{asset("assets/blog/assets/js/app.js")}}"></script>
<script src="{{asset('assets/bootstrap/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
//Language Selection
<script>
    function submitForm(locale) {
        const form = document.getElementById("language-form");
        const input = document.createElement("input");
        input.type = "hidden";
        input.name = "locale";
        input.value = locale;
        form.appendChild(input);
        form.submit();
    }
</script>

</body>
</html>
