@extends('admin.index')

@section('create_article')
<form method="post" action="{{route('store_article')}}" enctype="multipart/form-data">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">


            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <ul class="nav nav-pills" id="animateLine" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" id="animated-underline-home-tab" data-bs-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>English</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" id="animated-underline-home-tab2" data-bs-toggle="tab" href="#animated-underline-home2" role="tab" aria-controls="animated-underline-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>Georgian</button>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="tab-content" id="animateLineContent-4">
                        <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                            <div class="row">
                                <div class="row layout-top-spacing">
                                    <div class="widget-content widget-content-area">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4>Create New Article EN</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-12 ">

                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-group">

                                                        <label for="t-text">Title</label>
                                                        <input id="t-text" type="text" name="title" class="form-control  @error('title') is-invalid @enderror"  >
                                                        @error('title')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-4 mt-4">
                                                        <label for="exampleFormControlTextarea1">Content</label>
                                                        <textarea class="form-control  @error('body') is-invalid @enderror" name="body" id="exampleFormControlTextarea1"
                                                                  rows="3"></textarea>
                                                        @error('body')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="select-state">Categories</label>
                                                        <select id="select-state" name="categories[]" class="@error('categories') is-invalid @enderror" multiple placeholder="Select Category..." autocomplete="off">
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}" >{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('categories')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                <div class="form-group">
                                                 <p class="mt-2">SEO</p>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Title</span>
                                                    <input type="text" name="meta_title_en" class="form-control" placeholder="Username" aria-label="Username">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Keywords</span>
                                                    <input type="text" name="meta_keywords_en" class="form-control" placeholder="Username" aria-label="Username">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Description</span>
                                                    <input type="text" name="meta_descr_en" class="form-control" placeholder="Username" aria-label="Username">
                                                </div>
                                                </div>

                                                    <div class="form-group @error('article_photo') is-invalid @enderror">

                                                        <input style="width:max-content" id="photo" type="file" name="article_photo"
                                                               class="form-control mb-4 mt-4" >

                                                    </div>
                                                    @error('article_photo')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-group ">
                                                        <button class="btn btn-light-dark mb-4 me-4 _effect--ripple waves-effect waves-light">
                                                            Create
                                                        </button>
                                                    </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade " id="animated-underline-home2" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                            <div class="row">
                                <div class="row layout-top-spacing">
                                    <div class="widget-content widget-content-area">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4>Create New Article GE</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-12 ">

                                                    <div class="form-group">

                                                        <label for="t-text">Title</label>
                                                        <input id="t-text" type="text" name="title_ge" class="form-control"  >

                                                    </div>
                                                    <div class="form-group mb-4 mt-4">
                                                        <label for="exampleFormControlTextarea1">Content</label>
                                                        <textarea class="form-control  @error('body_ge') is-invalid @enderror" name="body_ge" id="exampleFormControlTextarea1"
                                                                  rows="3"></textarea>
                                                        @error('body')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                <div class="form-group">
                                                    <p class="mt-2">SEO</p>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Title</span>
                                                        <input type="text" name="meta_title_ge" class="form-control" placeholder="Username" aria-label="Username">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Keywords</span>
                                                        <input type="text" name="meta_keywords_ge" class="form-control" placeholder="Username" aria-label="Username">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Description</span>
                                                        <input type="text" name="meta_descr_ge" class="form-control" placeholder="Username" aria-label="Username">
                                                    </div>
                                                </div>

                                                    <div class="form-group ">
                                                        <button class="btn btn-light-dark mb-4 me-4 _effect--ripple waves-effect waves-light">
                                                            Create
                                                        </button>
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

    </div>
</form>
@endsection