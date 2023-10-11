@extends('admin.index')

@section('edit_profile')
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>



            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">


                    <div class="account-settings-container layout-top-spacing">

                        <div class="account-content">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h2>Settings</h2>


                                    <ul class="nav nav-pills" id="animateLine" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="animated-underline-home-tab" data-bs-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="animated-underline-home-tab2" data-bs-toggle="tab" href="#animated-underline-home2" role="tab" aria-controls="animated-underline-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>Credentials</button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="animated-underline-contact-tab" data-bs-toggle="tab" href="#animated-underline-contact" role="tab" aria-controls="animated-underline-contact" aria-selected="false" tabindex="-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> Danger Zone</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content" id="animateLineContent-4">
                                <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <form class="section general-info" method="post" action="{{route('update_profile')}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="info">
                                                    <h6 class="">General Information</h6>
                                                    <div class="row">
                                                        <div class="col-lg-11 mx-auto">
                                                            <div class="row">
                                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                                    <div class="profile-image  mt-4 pe-md-4">

                                                                        <!-- // The classic file input element we'll enhance
                                                                        // to a file pond, we moved the configuration
                                                                        // properties to JavaScript -->

                                                                        <div class="img-uploader-content">
                                                                            <input type="file" class="filepond"
                                                                                   name="filepond" accept="image/png, image/jpeg, image/gif"/>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                                    <div class="form">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="fullName">Name</label>
                                                                                    <input type="text" class="form-control mb-3" id="fullName" placeholder="Full Name" value="Jimmy Turner">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="profession">Profession</label>
                                                                                    <input type="text" class="form-control mb-3" id="profession" placeholder="Designer" value="Web Developer">
                                                                                </div>
                                                                            </div>



                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="location">Age</label>
                                                                                    <input type="text" class="form-control mb-3" id="location" placeholder="Location">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="phone">Phone</label>
                                                                                    <input type="text" class="form-control mb-3" id="phone" placeholder="Write your phone number here" value="+1 (530) 555-12121">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="email">Email</label>
                                                                                    <input type="text" class="form-control mb-3" id="email" placeholder="Write your email here" value="Jimmy@gmail.com">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="website1">Github</label>
                                                                                    <input type="text" class="form-control mb-3" id="website1" placeholder="Enter URL">
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-md-12 mt-1">
                                                                                <div class="form-group text-end">
                                                                                    <button class="btn btn-secondary">Save</button>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade " id="animated-underline-home2" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <form class="section general-info" method="post" action="{{route('update_profile')}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="info">
                                                    <h6 class="">Email & Password</h6>
                                                    <div class="row">
                                                        <div class="col-lg-11 mx-auto">
                                                            <div class="row">

                                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                                    <div class="form">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="fullName">Password</label>
                                                                                    <input type="password" class="form-control mb-3" id="fullName" placeholder="Full Name" value="Jimmy Turner">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="email">Email</label>
                                                                                    <input type="text" class="form-control mb-3" id="email" placeholder="Write your email here" value="Jimmy@gmail.com">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12 mt-1">
                                                                                <div class="form-group text-end">
                                                                                    <button class="btn btn-secondary">Save</button>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="animated-underline-contact" role="tabpanel" aria-labelledby="animated-underline-contact-tab">
                                    <div class="alert alert-arrow-right alert-icon-right alert-light-warning alert-dismissible fade show mb-4" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                        <strong>Warning!</strong> Please proceed with caution. For any assistance - <a href="javascript:void(0);">Contact Us</a>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info">
                                                <div class="info">
                                                    <h6 class="">Purge Cache</h6>
                                                    <p>Remove the active resource from the cache without waiting for the predetermined cache expiry time.</p>
                                                    <div class="form-group mt-4">
                                                        <button class="btn btn-secondary btn-clear-purge">Clear</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info">
                                                <div class="info">
                                                    <h6 class="">Deactivate Account</h6>
                                                    <p>You will not be able to receive messages, notifications for up to 24 hours.</p>
                                                    <div class="form-group mt-4">
                                                        <div class="switch form-switch-custom switch-inline form-switch-success mt-1">
                                                            <input class="switch-input" type="checkbox" role="switch" id="socialformprofile-custom-switch-success">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info">
                                                <div class="info">
                                                    <h6 class="">Delete Account</h6>
                                                    <p>Once you delete the account, there is no going back. Please be certain.</p>
                                                    <div class="form-group mt-4">
                                                        <button class="btn btn-danger btn-delete-account">Delete my account</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

@endsection