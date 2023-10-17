@extends('admin.index')

@section('hero_section')
{{--    @php--}}
{{--        dd($hero)--}}
{{--    @endphp--}}
<div class="widget-content widget-content-area">
    <form action="{{route('hero_update')}}" method="post" enctype="multipart/form-data">
@method('PUT')
        @csrf
        <div class="row mb-3">
        <label for="greeting">Update Greeting</label>
        <input class="form-control w-25" type="text" name="greeting" id="greeting" value="{{ $hero->greeting}}" >
        </div>
        <div class="row mb-3">
            <label for="text">Update Text</label>
            <textarea  class="form-control w-25"  type="text" name="text" id="text" >{{$hero->text}}</textarea>
        </div>
        <div class="row mb-3">
            <label for="header_text">Header Text</label>
            <input class="form-control w-25"  type="text" name="header_text" id="header_text" value="{{$hero->header_text}}" >
        </div>
        <div class="row mb-3">
            <label for="email">Contact Email</label>
            <input class="form-control w-25"  type="email" name="email" id="email" value="{{$hero->email}}">
        </div>
        <div class="row mb-3">
            <label for="my_photo">Hero Photo</label>
            <input class="form-control w-25"  type="file" name="my_photo" id="my_photo" >
        </div>
        <button class="btn btn-primary _effect--ripple waves-effect waves-light">Submit</button>
    </form>
</div>
@endsection

