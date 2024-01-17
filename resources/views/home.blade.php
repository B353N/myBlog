@extends('layouts.master')

@section('title', 'Home')


@section('content')
<div class="myblog-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="block-21 d-flex animate-box">
                    <a href="#" class="blog-img" style="background-image: url({{ asset('images/blog-1.jpg') }});"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                        <p>ven the all-powerful Pointing has no control about the blind texts it is an almost</p>
                        <div class="meta">
                            <div><a href="#"><span class="icon-calendar"></span> May 29, 2018</a></div>
                            <div><a href="#"><span class="icon-user2"></span> Admin</a></div>
                            <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                        </div>
                    </div>
                </div>

                <div class="block-21 d-flex animate-box">
                    <a href="#" class="blog-img" style="background-image: url({{ asset('images/blog-2.jpg') }});"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                        <p>ven the all-powerful Pointing has no control about the blind texts it is an almost</p>
                        <div class="meta">
                            <div><a href="#"><span class="icon-calendar"></span> May 29, 2018</a></div>
                            <div><a href="#"><span class="icon-user2"></span> Admin</a></div>
                            <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                        </div>
                    </div>
                </div>

                <div class="block-21 d-flex animate-box">
                    <a href="#" class="blog-img" style="background-image: url({{ asset('images/blog-3.jpg') }});"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                        <p>ven the all-powerful Pointing has no control about the blind texts it is an almost</p>
                        <div class="meta">
                            <div><a href="#"><span class="icon-calendar"></span> May 29, 2018</a></div>
                            <div><a href="#"><span class="icon-user2"></span> Admin</a></div>
                            <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                        </div>
                    </div>
                </div>

                <div class="block-21 d-flex animate-box">
                    <a href="#" class="blog-img" style="background-image: url({{ asset('images/blog-4.jpg') }});"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                        <p>ven the all-powerful Pointing has no control about the blind texts it is an almost</p>
                        <div class="meta">
                            <div><a href="#"><span class="icon-calendar"></span> May 29, 2018</a></div>
                            <div><a href="#"><span class="icon-user2"></span> Admin</a></div>
                            <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                        </div>
                    </div>
                </div>

                <div class="block-21 d-flex animate-box">
                    <a href="#" class="blog-img" style="background-image: url({{ asset('images/blog-5.jpg') }});"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                        <p>ven the all-powerful Pointing has no control about the blind texts it is an almost</p>
                        <div class="meta">
                            <div><a href="#"><span class="icon-calendar"></span> May 29, 2018</a></div>
                            <div><a href="#"><span class="icon-user2"></span> Admin</a></div>
                            <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                        </div>
                    </div>
                </div>

                <div class="block-21 d-flex animate-box">
                    <a href="#" class="blog-img" style="background-image: url({{ asset('images/blog-6.jpg') }});"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                        <p>ven the all-powerful Pointing has no control about the blind texts it is an almost</p>
                        <div class="meta">
                            <div><a href="#"><span class="icon-calendar"></span> May 29, 2018</a></div>
                            <div><a href="#"><span class="icon-user2"></span> Admin</a></div>
                            <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            @include('shared.sidebar')
        </div>
    </div>
</div>

<!-- Subscribe -->
@include('shared.subscribe')

@endsection
