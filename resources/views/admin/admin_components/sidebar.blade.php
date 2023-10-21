<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="./index.html">
                        <img src="../src/assets/img/logo.svg" class="navbar-logo" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="./index.html" class="nav-link"> Admin Panel </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            @role('admin')
            <li class="{{ request()->routeIs(['admin', 'my_skills', 'skills', 'projects', 'hero']) ? 'active menu' : 'menu' }}">
                <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Resume</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="dashboard" data-bs-parent="#accordionExample">

                    <li>
                        <a href="{{route('hero',['locale' => $locale])}}"> Hero Section </a>
                    </li>
                    <li>
                        <a href="{{route('my_skills',['locale' => $locale])}}">My Skills</a>
                    </li>
                    <li>
                        <a href="{{route('skills',['locale' => $locale])}}"> Skills </a>
                    </li>
                    <li>
                        <a href="{{route('projects',['locale' => $locale])}}"> Projects </a>
                    </li>
                </ul>
            </li>

            <li class="{{ request()->routeIs(['users','roles','permissions']) ? 'active menu' : 'menu' }}">
                <a href="#users" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Users</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="users" data-bs-parent="#accordionExample">
                    <li class="{{ request()->routeIs('users') ? 'active' : '' }}">
                        <a href="{{route('profile',['locale' => $locale])}}">Profile</a>
                    </li>
                    <li class="{{ request()->routeIs('users') ? 'active' : '' }}">
                        <a href="{{route('users',['locale' => $locale])}}">User Settings</a>
                    </li>
                    <li>
                        <a href="{{route('roles',['locale' => $locale])}}">Roles</a>
                    </li>
                    <li>
                        <a href="{{route('permissions',['locale' => $locale])}}">Permissions</a>
                    </li>
                </ul>
            </li>
            @endrole
            {{--Blog--}}
            @role('contributor|admin')
            <li class="menu active">
                <a href="#blog" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                        <span>Blog</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled show" id="blog" data-bs-parent="#accordionExample">
                    @role('admin')
                    <li class="{{request()->routeIs('admin') ? 'active' : '' }}">
                        <a href="#"> Analytics </a>
                    </li>
                    @endrole
                    <li>
                        <a href="{{route('blog',['locale' => $locale])}}" target="_blank"> Blog </a>
                    </li>
                    <li>
                        <a href="{{route('deleted_articles',['locale' => $locale])}}"> Deleted Articles </a>
                    </li>
                    <li>
                        <a href="{{route('article_list',['locale' => $locale])}}"> Articles </a>
                    </li>
                    <li class="active">
                        <a href="{{route('create_article',['locale' => $locale])}}"> Create Article </a>
                    </li>


                </ul>
            </li>
            @endrole

        </ul>



    </nav>

</div>
<!--  END SIDEBAR  -->

