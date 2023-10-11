@extends('admin.index')

@section('roles')
    <div id="tableHover" class="col-lg-12 col-12 layout-spacing" >

        <!-- End New Skill  -->
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Roles</h4>
                    </div>
                </div>
                <button style="width:max-content" class="btn btn-dark mb-2 me-4 " id="openModalBtn">Add Skill</button>
                <!--Add New role  -->

                <div id="modal" class="modal">
                    <div class="modal-content">
                        <h2>Add New Role</h2>
                        <form id="editForm" method="post" action="{{route('add_roles')}}">
                            @csrf
                            <label for="name">Role Name:</label>
                            <input type="text" id="name" name="name"  />
                            <label>Permissions</label>
                            @foreach($roles as $index=>$role)
                                <div class="form-check">
                                <input type="checkbox" id="{{"permission_ . $index"}}" name="permission[]" value="{{$role->id}}"  >
                                <label for="{{"permission_ . $index"}}">{{$role->name}}</label>
                                </div>
                            @endforeach
                            <button type="submit">Add</button>
                            <button type="button" id="closeModalBtn">cancel</button>
                            <div id="confirmationDialog" class="modal">
                                <div class="modal-content">
                                    <h2>Confirmation</h2>
                                    <p>Do you want to discard unsaved changes?</p>
                                    <button id="cancelConfirmBtn" type="button">Cancel</button>
                                    <button id="confirmChangesBtn" type="button">Confirm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div  class="widget-content widget-content-area">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead >
                        <tr>
                            <th class="checkbox-area" scope="col">
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input" id="hover_parent_all" type="checkbox">
                                </div>
                            </th>
                            <th scope="col">Name</th>
                            <th scope="col">Permissions</th>
                            <th scope="col">Created At</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $index=>$role)
                        <tr>
                            <td>
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input hover_child" type="checkbox">
                                </div>
                            </td>
                            <td>{{$role->name}}</td>
                            <td>
                            @foreach($role->permissions as $permission)
                              <p>{{$permission->name}}</p>
                            @endforeach
                            </td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <span class="table-inner-text">{{$role->created_at}}</span>
                            </td>

                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <!-- Button to open the modal for this iteration -->
                                        <a class="dropdown-item">
                                            <button style="all: unset;" class="openModalBtn2"
                                                    data-modal-target2="{{ $index }}">Update
                                            </button>
                                        </a>


                                        <form method="post" action="{{route('delete_roles',['role' => $role])}}">
                                            @csrf
                                            @method('post')
                                            <a class="dropdown-item">
                                                <button style="all: unset;" type="submit" class="dropdown-item">Delete
                                                </button>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div id="{{ 'modal2_' . $index }}" class="modal2">
                            <div class="modal-content2">
                                <h2>Edit Role</h2>
                                <form id="{{ 'editForm2_' . $index }}" method="post" action="{{route('edit_roles',['role' => $role])}}">
                                    @csrf
                                    @method('PUT')
                                    <label for="name">Role Name:</label>
                                    <input type="text" id="name" name="name"  />
                                    <label>Permissions</label>
                                    @foreach($role as $index=>$permission)
                                        <div class="form-check">
                                            <input type="checkbox" id="{{"permission_ . $index"}}" name="permission[]" value="{{$role->id}}"  >
                                            <label for="{{"permission_ . $index"}}">{{$role->name}}</label>
                                        </div>
                                    @endforeach

                                    <button type="submit">Add</button>
                                    <button type="button" class="closeModalBtn2" data-modal-target2="{{ $index }}">
                                        Cancel
                                    </button>
                                    <div id="{{ 'confirmationDialog2_' . $index }}"
                                         class="modal2 confirmationDialog2">
                                        <div class="modal-content2">
                                            <h2>Confirmation</h2>
                                            <p>Do you want to discard unsaved changes?</p>
                                            <button class="closeModalBtn2" type="button"
                                                    data-modal-target2="{{ $index }}">Cancel
                                            </button>
                                            <button type="button" id="{{ 'confirmChangesBtn2_' . $index }}"
                                                    class="confirmChangesBtn2">Confirm
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection