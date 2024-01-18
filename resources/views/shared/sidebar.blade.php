<div class="col-md-4 animate-box">
    <div class="sidebar">
        <div class="side">
            <h3 class="sidebar-heading">Categories</h3>
            <div class="block-24">
                <ul>
                    @foreach($categories as $category)
                        <li><a href="#">{{ $category->name }} <span>{{ $category->posts_count }}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="side">
            <h3 class="sidebar-heading">Recent Blog</h3>
            @foreach($recent_posts as $recent_post)
                <div class="f-blog">
                <a href="blog.html" class="blog-img" style="background-image: url({{ asset('storage/' . $recent_post->image->path) }});">
                </a>
                <div class="desc">
                    <p class="admin"><span>{{ $recent_post->created_at->diffForHumans() }}</span></p>
                    <h2><a href="blog.html">{{ Str::limit($recent_post->title, 20) }}</a></h2>
                    <p>{{ $recent_post->excerpt }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="side">
            <h3 class="sidbar-heading">Tags</h3>
            <div class="block-26">
                <ul>
                    @foreach($tags as $tag)
                        <li><a href="#">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
