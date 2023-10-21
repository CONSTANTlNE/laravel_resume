{{--@php--}}
{{--dd($locale);--}}
{{-- @endphp--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>CONSTANTINE</title>
    <script src="{{asset('assets/custom/JS/portfolio.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('assets/custom/CSS/portfolio.css')}}">
    <style>
        svg{
            height: 100px;
            width: 100px;
        }
    </style>
</head>
<body>
<header>
    <nav class="nav">
        <a href="#" class="nav__name text__color__1">{{$hero->header_text}}</a>
        <a href="{{route('blog',['locale' => $locale])}}" class="nav__name text__color__1">Blog</a>
        <div class="socials">
            <a href="https://github.com/CONSTANTlNE" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24">
                    <path
                            fill="#FFF"
                            fill-rule="evenodd"
                            d="M12.304 0C5.506 0 0 5.506 0 12.304c0 5.444 3.522 10.042 8.413 11.672.615.108.845-.261.845-.584 0-.292-.015-1.261-.015-2.291-3.091.569-3.891-.754-4.137-1.446-.138-.354-.738-1.446-1.261-1.738-.43-.23-1.046-.8-.016-.815.97-.015 1.661.892 1.892 1.261 1.107 1.86 2.876 1.338 3.584 1.015.107-.8.43-1.338.784-1.646-2.738-.307-5.598-1.368-5.598-6.074 0-1.338.477-2.446 1.26-3.307-.122-.308-.553-1.569.124-3.26 0 0 1.03-.323 3.383 1.26.985-.276 2.03-.415 3.076-.415 1.046 0 2.092.139 3.076.416 2.353-1.6 3.384-1.261 3.384-1.261.676 1.691.246 2.952.123 3.26.784.861 1.26 1.953 1.26 3.307 0 4.721-2.875 5.767-5.613 6.074.446.385.83 1.123.83 2.277 0 1.645-.015 2.968-.015 3.383 0 .323.231.708.846.584a12.324 12.324 0 0 0 8.382-11.672C24.607 5.506 19.101 0 12.304 0Z"
                    />
                </svg>
            </a>
            <a href="https://www.frontendmentor.io/profile/CONSTANTlNE" target="_blank"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="23">
                    <path
                            fill="#FFF"
                            d="M13.084.23a.751.751 0 0 0-.736.75v14.267a.75.75 0 1 0 1.5 0V.98a.75.75 0 0 0-.763-.75ZM24.44 4.504a.752.752 0 0 0-.284.064l-6.44 2.875a.752.752 0 0 0 0 1.37l6.44 2.884a.75.75 0 0 0 .612-1.369L19.861 8.13l4.907-2.191a.753.753 0 0 0 .38-.99.752.752 0 0 0-.708-.444ZM1.371 9.663a.752.752 0 0 0-.74.938C2.41 17.447 8.603 22.23 15.685 22.23a.75.75 0 1 0 0-1.501A14.053 14.053 0 0 1 2.083 10.225a.75.75 0 0 0-.712-.561v-.001Z"
                    />
                </svg
                >
            </a>
            <a href="https://www.linkedin.com/in/constantine-alaverdashvili-65161259/" target="_blank"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24">
                    <path
                            fill="#FFF"
                            fill-rule="evenodd"
                            d="M5.551 3.304c-1.14 0-2.067.926-2.067 2.064 0 1.14.928 2.066 2.067 2.066a2.066 2.066 0 0 0 0-4.13ZM3.767 8.998v11.453h3.562L7.33 8.998H3.767Zm5.798 0V20.45l3.554.002.002-5.668c0-1.454.253-2.941 2.132-2.941 1.851 0 1.851 1.755 1.851 3.036v5.571l3.559-.001v-6.28c0-2.834-.517-5.457-4.27-5.457-1.763 0-2.916.997-3.368 1.85h-.05V8.997h-3.41ZM22.435 24H1.982c-.976 0-1.77-.777-1.77-1.732V1.731C.212.776 1.006 0 1.982 0h20.453c.98 0 1.777.776 1.777 1.73v20.538c0 .955-.797 1.732-1.777 1.732Z"
                    />
                </svg
                >
            </a>

        </div>
        @foreach ($cover as $image)
            <img src="{{ $image->getUrl() }}" alt="" class="photo"/>
        @endforeach


    </nav>
</header>
<main>


    <h1 class="text__color__1">{{$hero->greeting}}</h1>
    <p class="about__text text__color__2 mobile__view">
        {{$hero->text}}
    </p>
    <a href="mailto:{{ $hero->email}}" class="contact__me text__color__2">CONTACT ME</a>
    <section class="skills">
        @foreach($skills as $skill)
            <div class="skills__name">
                <h3 class="text__color__1">
                    {!! $skill->skill_icon !!}
                </h3>
                <p class="text__color__2">{{$skill->experience}}</p>
            </div>
        @endforeach
    </section>
    <div class="projects__heading">
        <h2 class="text__color__1">Projects</h2>
        <a href="#contact" class="contact__me text__color__2">CONTACT ME</a>
    </div>
    <section class="projects">
@foreach($projects as $project)
        <div class="projects__item projects__item_1">
            <div class="projects__item__img">
                @foreach($project->media as $img)
                    <img src="{{$img->getUrl()}}" alt=""/>
                @endforeach

                <div class="projects__links__desktop">
                    <a target="_blank" href="{{$project->project_url}}"
                       class="projects__links__style">VIEW PROJECT</a>
                    <a target="_blank" href="{{$project->code_url}}"
                       class="projects__links__style">VIEW CODE</a>
                </div>
            </div>
            <h4 class="text__color__1">{{$project->project_name}}</h4>
            <div class="projects__item--tech">
                @foreach($project->skillnames as $skill)
                <p class="text__color__2">{{$skill->name}}</p>
                @endforeach
            </div>
            <div class="projects__links__mobile">
                <a href="{{$project->project_url}}" class="projects__links__style" target="_blank">VIEW
                    PROJECT</a>
                <a target="_blank" href="{{$project->code_url}}" class="projects__links__style">VIEW
                    CODE</a>
            </div>
        </div>
        @endforeach


    </section>
</main>
<footer>
    <form
            action="https://formsubmit.co/623fb1b7946021748e2464e725d5ae88"
            method="POST"
    >
        <div class="footer_text mobile__view">
            <h2 class="text__color__1">Contact</h2>
            <p class="text__color__2">
                I would love to hear about your project and how I could help. Please
                fill in the form, and I’ll get back to you as soon as possible.
            </p>
        </div>
        <div class="form_fields mobile__view" id="contact">
            <input type="text" placeholder="NAME" name="sender"/>
            <input type="email" placeholder="EMAIL" name="sender_email"/>
            <textarea id="" placeholder="MESSAGE" name="sender_text"></textarea>
            <button type="submit" class="contact__me text__color__2" id="submit">
                SEND MESSAGE
            </button>
        </div>
    </form>

    <nav class="nav">

        <form method="POST" action="{{ route('set-locale',['locale' => app()->getLocale()]) }}">
            @csrf
            @method('POST')
            <label for="locale">Choose Locale:</label>
            <select name="locale" id="locale">
                @foreach ($locales as $key => $name)

                    <option value="{{ $key }}" {{ app()->getLocale() === $key ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
            <button type="submit">Set Locale</button>
        </form>
        <a href="{{route('login',['locale' => $locale])}}" class="nav__name text__color__1">{{__('Log_In')}}</a>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="nav__name text__color__1">Log Out</button>
        </form>
        <div class="socials">
            <a href="https://github.com/CONSTANTlNE" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24">
                    <path
                            fill="#FFF"
                            fill-rule="evenodd"
                            d="M12.304 0C5.506 0 0 5.506 0 12.304c0 5.444 3.522 10.042 8.413 11.672.615.108.845-.261.845-.584 0-.292-.015-1.261-.015-2.291-3.091.569-3.891-.754-4.137-1.446-.138-.354-.738-1.446-1.261-1.738-.43-.23-1.046-.8-.016-.815.97-.015 1.661.892 1.892 1.261 1.107 1.86 2.876 1.338 3.584 1.015.107-.8.43-1.338.784-1.646-2.738-.307-5.598-1.368-5.598-6.074 0-1.338.477-2.446 1.26-3.307-.122-.308-.553-1.569.124-3.26 0 0 1.03-.323 3.383 1.26.985-.276 2.03-.415 3.076-.415 1.046 0 2.092.139 3.076.416 2.353-1.6 3.384-1.261 3.384-1.261.676 1.691.246 2.952.123 3.26.784.861 1.26 1.953 1.26 3.307 0 4.721-2.875 5.767-5.613 6.074.446.385.83 1.123.83 2.277 0 1.645-.015 2.968-.015 3.383 0 .323.231.708.846.584a12.324 12.324 0 0 0 8.382-11.672C24.607 5.506 19.101 0 12.304 0Z"
                    />
                </svg>
            </a>
            <a href="https://www.frontendmentor.io/profile/CONSTANTlNE" target="_blank" fill
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="23">
                    <path
                            fill="#FFF"
                            d="M13.084.23a.751.751 0 0 0-.736.75v14.267a.75.75 0 1 0 1.5 0V.98a.75.75 0 0 0-.763-.75ZM24.44 4.504a.752.752 0 0 0-.284.064l-6.44 2.875a.752.752 0 0 0 0 1.37l6.44 2.884a.75.75 0 0 0 .612-1.369L19.861 8.13l4.907-2.191a.753.753 0 0 0 .38-.99.752.752 0 0 0-.708-.444ZM1.371 9.663a.752.752 0 0 0-.74.938C2.41 17.447 8.603 22.23 15.685 22.23a.75.75 0 1 0 0-1.501A14.053 14.053 0 0 1 2.083 10.225a.75.75 0 0 0-.712-.561v-.001Z"
                    />
                </svg
                >
            </a>
            <a href="https://www.linkedin.com/in/constantine-alaverdashvili-65161259/"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24">
                    <path
                            fill="#FFF"
                            fill-rule="evenodd"
                            d="M5.551 3.304c-1.14 0-2.067.926-2.067 2.064 0 1.14.928 2.066 2.067 2.066a2.066 2.066 0 0 0 0-4.13ZM3.767 8.998v11.453h3.562L7.33 8.998H3.767Zm5.798 0V20.45l3.554.002.002-5.668c0-1.454.253-2.941 2.132-2.941 1.851 0 1.851 1.755 1.851 3.036v5.571l3.559-.001v-6.28c0-2.834-.517-5.457-4.27-5.457-1.763 0-2.916.997-3.368 1.85h-.05V8.997h-3.41ZM22.435 24H1.982c-.976 0-1.77-.777-1.77-1.732V1.731C.212.776 1.006 0 1.982 0h20.453c.98 0 1.777.776 1.777 1.73v20.538c0 .955-.797 1.732-1.777 1.732Z"
                    />
                </svg
                >
            </a>

        </div>
    </nav>
</footer>
</body>
</html>
