@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <div class="myblog-classes">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row row-pb-lg">
                        <div class="col-md-12 animate-box">
                            <div class="classes class-single">
                                <div class="classes-img" style="background-image: url({{ asset('storage/' . $post->image->path)  }});">
                                </div>
                                <div class="desc desc2">
                                    <h3><a href="{{ route('post.show', $post) }}">{{ $post->title }}</a></h3>
                                    <p>{{ $post->excerpt }}</p>
                                    <p>{!! $post->body !!}</p>
                                </div>
                            </div>
                            @auth
                                @if(auth()->user()->role->name == 'admin')
                                    <p class="star">
                                        <span class="text-left"><a href="#" onclick="event.preventDefault(); document.getElementById('post-delete').submit()" class="edit">Delete Post <i class="icon-edit"></i></a></span>
                                    </p>
                                    <form id="post-delete" action="{{ route('post.delete', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <div class="row row-pb-lg animate-box">
                        <div class="col-md-12">
                            <h2 class="myblog-heading-2">{{ $post->comments->count() }} Comments</h2>
                            @foreach($comments as $comment)
                                <div id="comment_{{ $comment->id }}" class="review">
                                    <div class="user-img" style="background-image: url({{ asset('storage/' . $comment->user->image->path) }})"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">{{ $comment->user->name }}</span>
                                            <span class="text-right">{{ $comment->created_at->diffForHumans() }}</span>
                                        </h4>
                                        <p>{{ $comment->the_comment }}</p>
                                        @auth
                                            <p class="star">
                                                <button id="reply" type="button" onclick="showForm({{ $comment->id }})">Reply <i class="icon-reply"></i></button>
                                            @if(auth()->user()->id == $comment->user_id)

                                                    <span class="text-left"><a href="#" onclick="event.preventDefault(); document.getElementById('delete-comment').submit()" class="delete">Delete <i class="icon-delete"></i></a></span>

                                                <form id="delete-comment" action="{{ route('comment.delete', $comment) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @elseif(auth()->user()->role->name == 'admin')
                                                    <span class="text-left"><a href="#" onclick="event.preventDefault(); document.getElementById('delete-comment').submit()" class="edit">Delete <i class="icon-delete"></i></a></span>
                                                <form id="delete-comment" action="{{ route('comment.delete', $comment) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endif
                                            </p>
                                            <div id="reply-form-{{ $comment->id }}" class="col-md-12" style="display:none;">
                                                <h2 class="myblog-heading-2">Reply to {{ $comment->user->name }}</h2>
                                                <form id="comment-form" action="{{ route('comment.reply', $comment) }}" method="post">
                                                    @csrf
                                                    <div class="row form-group">
                                                        <input type="hidden" name="post" value="{{$comment->post->id}}">
                                                        <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                                        <div class="col-md-12">
                                                            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" value="Post Comment" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                        @endauth
                                    </div>
                                    @if(\PHPUnit\Framework\isNull($comment->replies))
                                        @include('shared.reply')
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @auth
                        <div class="row animate-box">
                            <div class="col-md-12">
                                <h2 class="myblog-heading-2">Say something</h2>
                                <form id="comment-form" action="{{ route('post.comment', $post) }}" method="post">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <!-- <label for="message">Message</label> -->
                                            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Post Comment" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Sidebar -->
                @include('shared.sidebar')
            </div>
        </div>
    </div>
@endsection

@push('custom-js')
    <script type="text/javascript">
        function showForm(id)
        {
            var formId = "reply-form-" + id;
            document.getElementById(formId).style.display="block";
        }
    </script>
@endpush
