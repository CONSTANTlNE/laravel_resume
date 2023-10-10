<div class="aai-sidebar-widget mb-4">
    <h3 class="aai-sidebar-title">Recent Post</h3>
    <ul class="mt-4 aai-blog-lists d-flex flex-column gap-3">
        @foreach($recent_articles as $article)

            <li class="aai-blog-list-item">
                <a
                        href="{{route('show_article',['article'=>$article])}}"
                        class="d-flex align-items-center gap-3"
                >
                    <i class="fa-solid fa-angle-right"></i>
                    <span
                    >{{$article->title}}</span
                    >
                </a>
            </li>
        @endforeach
    </ul>
</div>