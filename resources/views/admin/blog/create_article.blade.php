@extends('admin.index')

@section('create_article')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">


                <!-- CONTENT AREA -->
                <div class="row layout-top-spacing">
                    <div class="widget-content widget-content-area">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Create New Article</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12 ">
                                <form method="post" action="{{route('store_article')}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">

                                        <label for="t-text">Title</label>
                                        <input id="t-text" type="text" name="title" class="form-control" required>

                                    </div>
                                    <div class="form-group mb-4 mt-4">
                                        <label for="exampleFormControlTextarea1">Content</label>
                                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1"
                                                  rows="3"></textarea>
                                    </div>
                                    <div class="form-group ">
                                    <label for="select-state">Categories</label>
                                    <select id="select-state" name="categories[]" multiple placeholder="Select Category..." autocomplete="off">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group">

                                        <input style="width:max-content" id="photo" type="file" name="article_photo"
                                               class="form-control mb-4 mt-4" required>

                                    </div>
                                    <div class="form-group ">
                                        <button class="btn btn-light-dark mb-4 me-4 _effect--ripple waves-effect waves-light">
                                            Create
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- CONTENT AREA -->

            </div>

        </div>


    </div>
    <!--  END CONTENT AREA  -->
@endsection