@extends('admin.index')

@section('profile')
    <!-- Content -->
    <div class="row layout-spacing ">

        <!-- Profile -->
        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
            <div class="user-profile">
                <div style="padding:20px" class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="">Profile</h3>
                        <a href="{{route('edit_profile')}}" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                    </div>
                    <div class="text-center user-info">
                        <img src="../src/assets/img/profile-3.jpeg" alt="avatar">
                        <p class="">Jimmy Turner</p>
                    </div>
                    <div class="user-info-list">

                        <div class="">
                            <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee me-3"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg> Web Developer
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar me-3"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>Jan 20, 1989
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin me-3"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>New York, USA
                                </li>
                                <li class="contacts-block__item">
                                    <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail me-3"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>Jimmy@gmail.com</a>
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone me-3"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> +1 (530) 555-12121
                                </li>
                            </ul>

                            <ul class="list-inline mt-4">
                                <li class="list-inline-item mb-0">
                                    <a class="btn btn-info btn-icon btn-rounded" href="javascript:void(0);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                    </a>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a class="btn btn-danger btn-icon btn-rounded" href="javascript:void(0);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dribbble"><circle cx="12" cy="12" r="10"></circle><path d="M8.56 2.75c4.37 6.03 6.02 9.42 8.03 17.72m2.54-15.38c-3.72 4.35-8.94 5.66-16.88 5.85m19.5 1.9c-3.5-.93-6.63-.82-8.94 0-2.58.92-5.01 2.86-7.44 6.32"></path></svg>
                                    </a>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a class="btn btn-dark btn-icon btn-rounded" href="javascript:void(0);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <br>
    <!-- Followings-->

    <div class="row layout-spacing">
        <h2>Followings</h2>
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <table id="style-2" class="table style-2 dt-table-hover">
                        <thead>
                        <tr>
                            <th class="checkbox-column dt-no-sorting"> Record Id </th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Status</th>
                            <th class="text-center dt-no-sorting">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($following_users as $index=>$result)
{{--                                    @php--}}
{{--                                        dd($result)--}}
{{--                                    @endphp--}}
                        <tr>
                            <td class="checkbox-column"> {{$index+1}} </td>
                            <td>
                                <form class="d-flex align-items-center gap-2" action="{{route('blog',[$user])}} ">
                                    <input type="hidden" name="user" value="{{$result->id}}">
                                    <a style="cursor: pointer" class="d-flex align-items-center gap-2 hover"> <button  style="all: unset;" class= "d-flex align-items-center gap-2 hover">{{$result->name}}</button></a>
                                </form>
                            </td>
                            <td>{{$result->email}}</td>

                            <td class="text-center">
                                <span><img src="../src/assets/img/profile-9.jpeg" class="rounded-circle profile-img" alt="avatar"></span>
                            </td>
                            <td class="text-center"><span class="shadow-none badge badge-primary">Following</span></td>
                            <td class="text-center">
                                <form class="d-flex align-items-center gap-2" action="{{route('follow')}} " method='post'>
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="id" value="{{$result->id}}">
                                    <a style="cursor: pointer" class="d-flex align-items-center gap-2 hover"> <button  style="all: unset;" class= "d-flex align-items-center gap-2 hover"> @if (auth()->user() && auth()->user()->isFollowing($result))Unfollow @else Follow  @endif </button></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Followers-->
    <div class="row layout-spacing">
        <h2>Followers</h2>
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <table id="style-2" class="table style-2 dt-table-hover">
                        <thead>
                        <tr>
                            <th class="checkbox-column dt-no-sorting"> Record Id </th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Status</th>
                            <th class="text-center dt-no-sorting">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($follower_users as $index=>$result)
                            <tr>
                                <td class="checkbox-column"> {{$index+1}} </td>
                                <td>
                                    <form class="d-flex align-items-center gap-2" action="{{route('blog',[$user])}} ">
                                        <input type="hidden" name="user" value="{{$result->id}}">
                                        <a style="cursor: pointer" class="d-flex align-items-center gap-2 hover"> <button  style="all: unset;" class= "d-flex align-items-center gap-2 hover">{{$result->name}}</button></a>
                                    </form>
                                </td>
                                <td>{{$result->email}}</td>

                                <td class="text-center">
                                    <span><img src="../src/assets/img/profile-9.jpeg" class="rounded-circle profile-img" alt="avatar"></span>
                                </td>
                                <td class="text-center"><span class="shadow-none badge badge-primary">Following</span></td>
                                <td class="text-center">
                                    <form class="d-flex align-items-center gap-2" action="{{route('follow')}} " method='post'>
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="id" value="{{$result->id}}">
                                        <a style="cursor: pointer" class="d-flex align-items-center gap-2 hover"> <button  style="all: unset;" class= "d-flex align-items-center gap-2 hover"> @if (auth()->user() && auth()->user()->isFollowing($result))Unfollow @else Follow  @endif </button></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection