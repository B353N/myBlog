@foreach($comment->replies as $reply)
    <div id="comment_{{ $reply->id }}" class="review" style="margin-left: 30px">
        <div class="user-img" style="background-image: url({{ asset('storage/' . $comment->user->image->path) }})"></div>
        <div class="desc">
            <h4>
                <span class="text-left">{{ $reply->user->name }}</span>
                <span class="text-right">{{ $reply->created_at->diffForHumans() }}</span>
            </h4>
            <p>{{ $reply->the_comment }}</p>
            @auth
                <p class="star">
                    <button id="reply" type="button" onclick="showForm({{ $reply->id }})">Reply <i class="icon-reply"></i></button>
                    @if(auth()->user()->id == $reply->user_id)

                        <span class="text-left"><a href="#" onclick="event.preventDefault(); document.getElementById('delete-comment').submit()" class="delete">Delete <i class="icon-delete"></i></a></span>

                <form id="delete-comment" action="{{ route('comment.delete', $reply) }}" method="post">
                    @csrf
                    @method('DELETE')
                </form>
            @elseif(auth()->user()->role->name == 'admin')
                <span class="text-left"><a href="#" onclick="event.preventDefault(); document.getElementById('delete-comment').submit()" class="edit">Delete <i class="icon-delete"></i></a></span>
                <form id="delete-comment" action="{{ route('comment.delete', $reply) }}" method="post">
                    @csrf
                    @method('DELETE')
                </form>
                @endif
                </p>
                <div id="reply-form-{{ $reply->id }}" class="col-md-12" style="display:none;">
                    <h2 class="myblog-heading-2">Reply to {{ $reply->user->name }}</h2>
                    <form id="comment-form" action="{{ route('comment.reply', $reply) }}" method="post">
                        @csrf
                        <div class="row form-group">
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
        @if(\PHPUnit\Framework\isNull($reply->replies))
            @include('shared.nextLevelReply')
        @endif
    </div>
@endforeach
