@foreach($reply->replies as $nextLevelReply)
    <div id="comment_{{ $nextLevelReply->id }}" class="review" style="margin-left: 30px">
        <div class="user-img" style="background-image: url({{ asset('storage/' . $comment->user->image->path) }})"></div>
        <div class="desc">
            <h4>
                <span class="text-left">{{ $nextLevelReply->user->name }}</span>
                <span class="text-right">{{ $nextLevelReply->created_at->diffForHumans() }}</span>
            </h4>
            <p>{{ $nextLevelReply->the_comment }}</p>
            @auth
                <p class="star">
                    @if(auth()->user()->id == $nextLevelReply->user_id)

                        <span class="text-left"><a href="#" onclick="event.preventDefault(); document.getElementById('delete-comment').submit()" class="delete">Delete <i class="icon-delete"></i></a></span>

                <form id="delete-comment" action="{{ route('comment.delete', $nextLevelReply) }}" method="post">
                    @csrf
                    @method('DELETE')
                </form>
            @elseif(auth()->user()->role->name == 'admin')
                <span class="text-left"><a href="#" onclick="event.preventDefault(); document.getElementById('delete-comment').submit()" class="edit">Delete <i class="icon-delete"></i></a></span>
                <form id="delete-comment" action="{{ route('comment.delete', $nextLevelReply) }}" method="post">
                    @csrf
                    @method('DELETE')
                </form>
                @endif
                </p>
            @endauth
        </div>
    </div>
@endforeach
