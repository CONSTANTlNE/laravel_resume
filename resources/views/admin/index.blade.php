<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.11.0/css/flag-icons.min.css"
    />
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


    @if(request()->routeIs(['static_lang','users', 'roles', 'my_skills','projects', 'permissions', 'article_list','profile','deleted_articles']) )
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

    @if(request()->routeIs('my_skills') || request()->routeIs('skills') || request()->routeIs('projects')|| request()->routeIs('roles') || request()->routeIs('settings'))
        <!-- skills  -->
        <link href="{{asset('assets/custom/CSS/popup_modal.css')}}" rel="stylesheet" type="text/css"/>
        <!-- skills -->
    @endif


    @if(request()->routeIs(['create_article','edit_article']))
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{asset('assets/bootstrap/src/assets/css/light/scrollspyNav.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('assets/bootstrap/src/assets/css/dark/scrollspyNav.css')}}" rel="stylesheet"
              type="text/css"/>

        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/plugins/src/tomSelect/tom-select.default.min.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/plugins/css/light/tomSelect/custom-tomSelect.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/plugins/css/dark/tomSelect/custom-tomSelect.css')}}">

        <!--  END CUSTOM STYLE FILE  -->
    @endif

    @if(request()->routeIs('profile'))
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{asset('assets/bootstrap/src/assets/css/light/components/list-group.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{asset('assets/bootstrap/src/assets/css/light/users/user-profile.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('assets/bootstrap/src/assets/css/dark/components/list-group.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{asset('assets/bootstrap/src/assets/css/dark/users/user-profile.css')}}" rel="stylesheet"
              type="text/css"/>
        <!--  END CUSTOM STYLE FILE  -->

    @endif

    @if(request()->routeIs('edit_profile','create_article'))
        <!--  Edit User Profile -->
        <link rel="stylesheet" href="{{asset('assets/bootstrap/src/plugins/src/filepond/filepond.min.css')}}">
        <link rel="stylesheet"
              href="{{asset('assets/bootstrap/src/plugins/src/filepond/FilePondPluginImagePreview.min.css')}}">
        <link href="{{asset('assets/bootstrap/src/plugins/src/notification/snackbar/snackbar.min.css')}}"
              rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{asset('assets/bootstrap/src/plugins/src/sweetalerts2/sweetalerts2.css')}}">
        <link href="{{asset('assets/bootstrap/src/plugins/css/light/filepond/custom-filepond.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('assets/bootstrap/src/assets/css/light/components/tabs.css')}}" rel="stylesheet"
              type="text/css">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/assets/css/light/elements/alert.css')}}">
        <link href="{{asset('assets/bootstrap/src/plugins/css/light/sweetalerts2/custom-sweetalert.css')}}"
              rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/bootstrap/src/plugins/css/light/notification/snackbar/custom-snackbar.css')}}"
              rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/assets/css/light/forms/switches.css')}}">
        <link href="{{asset('assets/bootstrap/src/assets/css/light/components/list-group.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{asset('assets/bootstrap/src/assets/css/light/users/account-setting.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('assets/bootstrap/src/plugins/css/dark/filepond/custom-filepond.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('assets/bootstrap/src/assets/css/dark/components/tabs.css')}}" rel="stylesheet"
              type="text/css">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/assets/css/dark/elements/alert.css')}}">
        <link href="{{asset('assets/bootstrap/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css')}}"
              rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/bootstrap/src/plugins/css/dark/notification/snackbar/custom-snackbar.css')}}"
              rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/bootstrap/src/assets/css/dark/forms/switches.css')}}">
        <link href="{{asset('assets/bootstrap/src/assets/css/dark/components/list-group.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{asset('assets/bootstrap/src/assets/css/dark/users/account-setting.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('assets/bootstrap/layouts/vertical-dark-menu/css/dark/structure-mod.css')}}"
              rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/bootstrap/layouts/vertical-dark-menu/css/light/structure-mod.css')}}"
              rel="stylesheet" type="text/css"/>
        <!--  END CUSTOM STYLE FILE  -->
    @endif

    <!-- MODAL -->
    <link href="{{asset('assets/bootstrap/src/plugins/src/animate/animate.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/src/plugins/src/filepond/filepond.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('assets/bootstrap/')}}../src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link href="{{asset('assets/bootstrap/src/plugins/css/light/filepond/custom-filepond.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/bootstrap/src/plugins/css/dark/filepond/custom-filepond.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/bootstrap/src/assets/css/dark/components/modal.css')}}" rel="stylesheet"
          type="text/css"/>

    <!-- MODAL-->
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
@include('admin.admin_components.navbar')
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container sidebar-closed sbar-open" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('admin.admin_components.sidebar')
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
                @yield('soft_delete')
                @yield('site_settings')
                @yield('static_data_lang')
                @endrole

                {{--                contributor--}}
                @role('contributor')
                @yield('create_article')
                @yield('articles')
                @endrole
                {{--                contributor--}}

                @yield('edit_profile')
                @yield('profile')
            </div>
        </div>

        @include('admin.admin_components.footer')

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


@if(request()->routeIs(['users','article_list','profile','deleted_articles','static_lang']))
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

@if(request()->routeIs('my_skills')||request()->routeIs('skills') || request()->routeIs('projects') || request()->routeIs('roles') || request()->routeIs('settings'))
    <!-- skills  -->
    <script src="{{asset('assets/custom/JS/popup_modal.js')}}"></script>
    <script src="{{asset('assets/custom/JS/update_modal.js')}}"></script>
    <!-- skills -->
@endif

@if(request()->routeIs(['create_article','edit_article']))
    <script src="https://cdn.tiny.cloud/1/ivmbdafzpjulv37eiy4ua1spa59re10h61eocow6owus9ebp/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
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
        new TomSelect("#select-state", {
            maxItems: 10
        });
        new TomSelect("#select-state-2", {
            maxItems: 10
        });
    </script>
@endif


@if(request()->routeIs('edit_profile','create_article'))
    <!--  Edit User Profile -->
    <script src="{{asset('assets/bootstrap/src/plugins/src/filepond/filepond.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/src/plugins/src/filepond/FilePondPluginImagePreview.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/src/plugins/src/filepond/FilePondPluginImageCrop.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/src/plugins/src/filepond/FilePondPluginImageResize.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/src/plugins/src/filepond/FilePondPluginImageTransform.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/src/plugins/src/notification/snackbar/snackbar.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/src/plugins/src/sweetalerts2/sweetalerts2.min.js')}}}"></script>
    <script src="{{asset('assets/bootstrap/src/assets/js/users/account-settings.js')}}"></script>
    <!--  Edit User Profile -->
@endif

{{--MODAL--}}
<script>

    function addVideoInModal(btnSelector, videoSource, modalSelector, iframeHeight, iframeWidth, iframeContainer) {
        var myModal = new bootstrap.Modal(document.getElementById(modalSelector), {
            keyboard: false
        })
        document.querySelector(btnSelector).addEventListener('click', function () {
            var src = videoSource;
            myModal.show('show');
            var ifrm = document.createElement("iframe");
            ifrm.setAttribute("src", src);
            ifrm.setAttribute('width', iframeWidth);
            ifrm.setAttribute('height', iframeHeight);
            ifrm.style.border = "0";
            ifrm.setAttribute("allow", "encrypted-media");
            document.querySelector(iframeContainer).appendChild(ifrm);
        })
    }

    addVideoInModal('#yt-video-link', 'https://www.youtube.com/embed/YE7VzlLtp-4', 'videoMedia1', '315', '560', '.yt-container')

    addVideoInModal('#vimeo-video-link', 'https://player.vimeo.com/video/1084537', 'videoMedia2', '315', '560', '.vimeo-container')


    /**
     * ==================
     * Single File Upload
     * ==================
     */

    // We register the plugins required to do
    // image previews, cropping, resizing, etc.
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginImageCrop,
        FilePondPluginImageResize,
        FilePondPluginImageTransform,
        //   FilePondPluginImageEdit
    );

    // Select the file input and use
    // create() to turn it into a pond
    var modalImage = FilePond.create(
        document.querySelector('.filepond'),
        {
            // labelIdle: `<span class="no-image-placeholder"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span> <p class="drag-para">Drag & Drop your picture or <span class="filepond--label-action" tabindex="0">Browse</span></p>`,
            imagePreviewHeight: 170,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact circle',
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
        }
    );

    const myModalEl = document.getElementById('profileModal')
    myModalEl.addEventListener('shown.bs.modal', event => {
        modalImage.addFiles('../src/assets/img/drag-1.jpeg');
    })

</script>

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