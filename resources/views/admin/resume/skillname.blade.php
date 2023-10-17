@extends('admin.index')
@section('skill_names')

<div class="row layout-spacing" style="padding-top: 2rem">
    <button style="width:max-content" class="btn btn-dark mb-2 me-4 " id="openModalBtn">Add Skill</button>
    <!--Add New Skill  -->

    <div id="modal" class="modal">
        <div class="modal-content">
            <h2>Add New Skill</h2>
            <form id="editForm" method="post" action="{{route('add_skillname')}}">
                @csrf
                <label for="name">Skill Name:</label>
                <input type="text" id="name" name="name"  />
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
    <!-- End New Skill  -->

{{--===============================================--}}

{{--    +++++++++++++++++++++++++++++++++++++++--}}

    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <table id="style-1" class="table style-1 dt-table-hover non-hover">
                    <thead>
                    <tr>
                        <th class="checkbox-column dt-no-sorting"> Record no. </th>
                        <th>Skill Name</th>
                        <th class="text-center dt-no-sorting">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($skillnames as $index=> $skill)
                    <tr>
                        <td class="checkbox-column"> {{$index+1}} </td>
                        <td class="svg">{!! $skill->skill_name!!}</td>

                        <td class="text-center">
                            <div class="dropdown">
                                <a class="dropdown-toggle"  role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">

                                    <form method="post" action="{{route('delete_skillname',['skill' => $skill])}}">
                                        @csrf
                                        @method('post')
                                        <a class="dropdown-item"><button style="all: unset;" type="submit" class="dropdown-item">Delete</button> </a>
                                    </form>
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