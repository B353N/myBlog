@extends('layouts.master')

@section('title', 'Home')


@section('content')
<div class="myblog-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8 posts-col">
                @foreach($posts as $post)
                    <div class="block-21 d-flex animate-box post">
                        <a href="#" class="blog-img" style="background-image: url({{ asset('storage/' . $post->image->path) }});"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">{{ $post->title }}</a></h3>
                            <p class="excerpt">{{ $post->excerpt }}</p>
                            <div class="meta">
                                <div><a class="date" href="#"><span class="icon-calendar"></span> {{ $post->created_at->diffForHumans() }}</a></div>
                                <div><a class="author" href="#"><span class="icon-user2"></span> {{ $post->author->name }}</a></div>
                                <div class="comments-count"><a href="#"><span class="icon-chat"></span> {{ $post->comments_count}}</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                {{ $posts->onEachSide(2)->links() }}
            </div>

            <!-- Sidebar -->
            @include('shared.sidebar')
        </div>
    </div>
</div>

<!-- Subscribe -->
@include('shared.subscribe')

@endsection
