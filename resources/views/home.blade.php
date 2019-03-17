@extends('layouts.blog')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('https://picsum.photos/1200/800?image=988')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Figured Blog</h1>
                        <span class="subheading">From MongoDB</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($posts as $post)
                <div class="post-preview">
                    <a href="{{ route('post', ['slug' => $post->slug])  }}">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <h3 class="post-subtitle">{{ $post->subtitle }}</h3>
                    </a>
                    <p class="post-meta">Posted on {{ $post->created_at->format('j M Y') }}</p>
                </div>
                <hr>
                @endforeach

                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="{{ $posts->nextPageUrl() }}">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>
@endsection
