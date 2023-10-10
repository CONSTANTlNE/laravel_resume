<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/bootstrap/src/assets/img/setting.png')}}"/>
    <link href="{{asset('assets/bootstrap/layouts/vertical-dark-menu/css/light/loader.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/bootstrap/layouts/vertical-dark-menu/css/dark/loader.css')}}" rel="stylesheet"
          type="text/css"/>
    <script src="{{asset('assets/bootstrap/layouts/vertical-dark-menu/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('assets/bootstrap/src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/bootstrap/layouts/vertical-dark-menu/css/light/plugins.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/bootstrap/layouts/vertical-dark-menu/css/dark/plugins.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap/src/assets/css/light/elements/alert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap/src/assets/css/dark/elements/alert.css')}}">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->


    @if(request()->routeIs(['users', 'roles', 'my_skills','projects', 'permissions', 'article_list','profile']) )
        <!-- DataTable CSS -->
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/plugins/src/table/datatable/datatables.css')}}">

        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/plugins/css/light/table/datatable/dt-global_style.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/plugins/css/light/table/datatable/custom_dt_custom.css')}}">

        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/plugins/css/dark/table/datatable/dt-global_style.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/plugins/css/dark/table/datatable/custom_dt_custom.css')}}">

        <link href="{{asset('assets/bootstrap/layouts/vertical-dark-menu/css/dark/structure-mod.css')}}"
              rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/bootstrap/layouts/vertical-dark-menu/css/light/structure-mod.css')}}"
              rel="stylesheet" type="text/css"/>
        <!-- DataTable CSS -->

        <style>
            .svg svg {
                height: 100px !important;
                width: 100px !important;
            }
        </style>
    @endif

    @if(request()->routeIs('roles'))
        <!-- Simple Tables -->
        <link href="{{asset('assets/bootstrap/src/assets/css/light/scrollspyNav.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('assets/bootstrap/src/assets/css/dark/scrollspyNav.css')}}" rel="stylesheet"
              type="text/css"/>
        <!-- Simple Tables -->
        <style>.table {
                height: min-content;
            }

            .table-hover {
                margin-top: 3rem !important;
            }
        </style>
    @endif

    @if(request()->routeIs('my_skills') || request()->routeIs('skills') || request()->routeIs('projects')|| request()->routeIs('roles'))
        <!-- skills  -->
        <link href="{{asset('assets/custom/CSS/popup_modal.css')}}" rel="stylesheet" type="text/css"/>
        <!-- skills -->
    @endif


    @if(request()->routeIs(['create_article','edit_article']))
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{asset('assets/bootstrap/src/assets/css/light/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/bootstrap/src/assets/css/dark/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap/src/plugins/src/tomSelect/tom-select.default.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap/src/plugins/css/light/tomSelect/custom-tomSelect.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap/src/plugins/css/dark/tomSelect/custom-tomSelect.css')}}">

        <!--  END CUSTOM STYLE FILE  -->
    @endif

@if(request()->routeIs('profile'))
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{asset('assets/bootstrap/src/assets/css/light/components/list-group.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/bootstrap/src/assets/css/light/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/bootstrap/src/assets/css/dark/components/list-group.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/bootstrap/src/assets/css/dark/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->

@endif

</head>
<body class="alt-menu layout-boxed">

<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
@include('admin.components.navbar')
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container sidebar-closed sbar-open" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('admin.components.sidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">
                @role('admin')
                @yield('users')
                @yield('roles')
                @yield('permissions')
                @yield('hero_section')
                @yield('skills_section')
                @yield('skill_names')
                @yield('projects')
                @yield('create_article')
                @yield('articles')
                @endrole

{{--                contributor--}}
                @role('contributor')
                @yield('create_article')
                @yield('articles')
                @endrole
                @yield('profile')
            </div>
        </div>

        @include('admin.components.footer')

    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assets/bootstrap/src/plugins/src/global/vendors.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/src/plugins/src/mousetrap/mousetrap.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/src/plugins/src/waves/waves.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/layouts/vertical-dark-menu/app.js')}}"></script>
<script src="{{asset('assets/bootstrap/src/assets/js/custom.js')}}"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->


@if(request()->routeIs(['users','article_list','profile']))
    <!-- DataTable scripts -->
    <script src="{{asset('assets/bootstrap/src/plugins/src/table/datatable/datatables.js')}}"></script>
    <script>
        // var e;
        c1 = $('#style-1').DataTable({
            headerCallback: function (e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML = `

                <div class="form-check form-check-primary d-block">
                    <input class="form-check-input chk-parent"  type="checkbox" id="form-check-default">
                </div>

                `
            },
            columnDefs: [{
                targets: 0, width: "30px", className: "", orderable: !1, render: function (e, a, t, n) {
                    return `
                    <div class="form-check form-check-primary d-block">
                        <input class="form-check-input child-chk" name="check[]" value="{{isset($index) ? $index : ''}}" type="checkbox" id="form-check-default">
                    </div>`
                }
            }],
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c1);

        c2 = $('#style-2').DataTable({
            headerCallback: function (e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML = `
                <div class="form-check form-check-primary d-block new-control">
                    <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
                </div>`
            },
            columnDefs: [{
                targets: 0, width: "30px", className: "", orderable: !1, render: function (e, a, t, n) {
                    return `
                    <div class="form-check form-check-primary d-block new-control">
                        <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                    </div>`
                }
            }],
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c2);

        c3 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c3);
    </script>
    <!-- DataTable scripts -->
@endif

@if(request()->routeIs('roles'))
    <!--begin Simple Tables -->
    <script src="{{asset('assets/bootstrap/src/assets/js/scrollspyNav.js')}}"></script>
    <script>
        checkall('checkbox_parent_all', 'checkbox_child');
        checkall('hover_parent_all', 'hover_child');
        checkall('striped_parent_all', 'striped_child');
        checkall('bordered_parent_all', 'bordered_child');
        checkall('mixed_parent_all', 'mixed_child');
        checkall('noSpacing_parent_all', 'noSpacing_child');
        checkall('custom_mixed_parent_all', 'custom_mixed_child');
    </script>
    <!--end Simple Tables -->
@endif

@if(request()->routeIs('my_skills')||request()->routeIs('skills') || request()->routeIs('projects') || request()->routeIs('roles'))
    <!-- skills  -->
    <script src="{{asset('assets/custom/JS/popup_modal.js')}}"></script>
    <script src="{{asset('assets/custom/JS/update_modal.js')}}"></script>
    <!-- skills -->
@endif

@if(request()->routeIs(['create_article','edit_article']))
    <script src="https://cdn.tiny.cloud/1/ivmbdafzpjulv37eiy4ua1spa59re10h61eocow6owus9ebp/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
    <!-- Tom Select -->
    <script src="{{asset('assets/bootstrap/src/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('assets/bootstrap/src/plugins/src/tomSelect/tom-select.base.js')}}"></script>
    <script src="{{asset('assets/bootstrap/src/plugins/src/tomSelect/custom-tom-select.js')}}"></script>

    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        new TomSelect("#select-state",{
            maxItems: 10
        });
    </script>
@endif


</body>
</html>