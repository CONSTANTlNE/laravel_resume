@extends('admin.index')
@section('users')

    <div class="seperator-header layout-top-spacing">
        <h4 class="">Users</h4>
    </div>

<div class="row layout-spacing" >
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <table style="margin-top:3.5rem!important" id="style-1" class="table style-1 dt-table-hover non-hover">
                    <thead>
                    <tr>
                        <th class="checkbox-column dt-no-sorting"> Record no. </th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Email</th>
                        <th class="">Role</th>
                        <th class="text-center ">Total Articles</th>
                        <th class="text-center ">Total Followers</th>

                        <th class="text-center dt-no-sorting">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td class="checkbox-column"> {{$index+1}} </td>
                        <td class="user-name">
                            <form class="d-flex align-items-center gap-2" action="{{route('blog',[$user])}} ">
                                <input type="hidden" name="user" value="{{$user->id}}">
                                <a style="cursor: pointer" class="d-flex align-items-center gap-2 hover"> <button  style="all: unset;" class= "d-flex align-items-center gap-2 hover">{{$user->name}}</button></a>
                            </form>
                        </td>
                        <td class="">
                            <a class="profile-img" href="javascript: void(0);">
                                <img src="../src/assets/img/profile-3.jpeg" alt="product">
                            </a>
                        </td>
                        <td>{{$user->email}}</td>

                        <td>
                            <div class="d-flex">
                                <div class=" align-self-center d-m-success  mr-1 data-marker"></div>
                                <span class="label label-success">{{$user->roles->pluck('name')->implode(', ')}}</span>
                            </div>
                        </td>
                        <td>
                            <a class="dropdown-item" href="javascript:void(0);">{{$user->articles_count}}</a>

                        </td>
                        <td>{{$user->followers()->count()}}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink7">
                                    <a class="dropdown-item" href="javascript:void(0);">View</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);">View Response</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
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