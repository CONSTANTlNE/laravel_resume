@extends('admin.index')
@section('articles')
{{--@php--}}
{{--dd($articles);--}}
{{-- @endphp--}}
    <div class="row layout-spacing" style="padding-top: 2rem">
        <button style="width:max-content" class="btn btn-dark mb-2 me-4 " id="openModalBtn"><a href="{{route('create_article')}}" target="_blank">Create Article</a></button>

        {{--===============================================--}}

        {{--    +++++++++++++++++++++++++++++++++++++++--}}

        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">

                    <table id="style-1" class="table style-1 dt-table-hover non-hover">
                        <thead>
                        <tr>
                            <th class="checkbox-column dt-no-sorting"> Record no.</th>
                            <th>Author</th>
                            <th>Article Name</th>
                            <th>Article Image</th>
                            <th>Total Likes</th>
                            <th>Categories</th>
                            <th class="text-center dt-no-sorting">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $index=> $article)
                            <tr>
                                <td class="checkbox-column"> {{$index+1}} </td>
                                <td>{{$article->users->name}}</td>
                                <td>{{$article->title }}</td>

                                @foreach($article->media as $media)
                                    <td><img style="width:100px;height:100px" src="{{$media->getUrl()}}"></td>
                                @endforeach
                                <td>{{$article->likers()->count()}}
                                <td>
                                    @foreach ($article->categories as $category)
                                        <p>{{ $category->name }}</p>
                                    @endforeach
                                </td>

                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" role="button" id="dropdownMenuLink1"
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
                                            <a  class="dropdown-item" href="{{route('show_article',['article' => $article])}}" target="_blank">View Article</a>

                                            <a class="dropdown-item"
                                               href="{{route('edit_article',['article' => $article])}}" target="_blank">
                                                Edit
                                            </a>

                                            <form id="formView_2" method="post"
                                                  action="{{route('delete_article',['article' => $article])}}">
                                                @csrf
                                                @method('post')
                                                <a  class="dropdown-item">
                                                    <button style="all: unset;" type="button" class="dropdown-item" onclick="submitForm('formView_2')">
                                                        Delete
                                                    </button>
                                                </a>
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
    <script>
        function submitForm(formId) {
            document.getElementById(formId).submit();
        }
    </script>
@endsection