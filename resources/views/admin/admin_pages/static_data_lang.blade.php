@extends('admin.index')
@php
    //    dd(   $languageArrays);
@endphp
@section('title', 'Static Data')

@section('static_data_lang')



    <div class="row layout-spacing">

        <div class="widget-content widget-content-area mt-3">

            <!-- Button trigger modal -->
            <div class="text-center">
                <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Translation
                </button>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="modal-text">Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi. </p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light-dark" data-bs-dismiss="modal">Discard</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Table -->
        <div class="col-lg-12">

            <div class="statbox widget box box-shadow">

                <div class="widget-content widget-content-area">

                    <table id="style-1" class="table style-1 dt-table-hover non-hover">
                        <thead>
                        <tr>
                            <th class="checkbox-column dt-no-sorting"> Record no.</th>
                            <th>Blade Templ</th>
                            @foreach($languages as $language)
                                <th style="width:100px">{{strtoupper($language) }}</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(array_keys($blade) as $index => $blade )

                            <tr>
                                <td class="checkbox-column">{{$index+1}}</td>
                                <td>{{$blade}}</td>
                                <td style="width:100px; white-space: pre-wrap;">{{$data[$languages[0]][$blade]}}</td>
                                <td style="width:100px;white-space: pre-wrap;">{{$data[$languages[1]][$blade]}}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-more-horizontal">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <a class="dropdown-item" href="{{route('edit_static_lang',['en'=>$languages[0],'key'=>$blade,'texten'=>$data[$languages[0]][$blade],'ge'=>$languages[1],'textge'=>$data[$languages[1]][$blade]])}}">Edit</a>
                                            <form method="post" action="{{route('delete_static_lang')}}">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="key" value="{{$blade}}">
                                                <input type="hidden" name="en" value="{{$data[$languages[0]][$blade]}}">
                                                <input type="hidden" name="ge" value="{{$data[$languages[1]][$blade]}}">

                                            <a class="dropdown-item"><button style="all: unset;">Delete</button></a>
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