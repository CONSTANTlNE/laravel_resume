@extends('admin.index')
@php
    //        dd($request);
@endphp
@section('static_data_lang')

    <div class="row layout-spacing">
        <div class="col-lg-4 layout-spacing">

            <form action="{{route('update_static_lang')}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="key" value="{{$request->key}}">
                <div class="widget-content widget-content-area">
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{$request->en}}</span>
                        <input type="text" class="form-control" value="{{$request->texten}}" name="texten" placeholder="Username"
                               aria-label="Username">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{$request->ge}}</span>
                        <input value="{{$request->textge}}" type="text" name="textge" class="form-control" placeholder="Server"
                               aria-label="Server">
                    </div>
                    <button class="btn btn-dark mb-2 me-4 _effect--ripple waves-effect waves-light">Edit</button>
                </div>
            </form>
        </div>
    </div>

@endsection