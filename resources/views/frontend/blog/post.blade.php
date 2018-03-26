@extends('frontend.layout')

@section('og-title', $post->title)
@section('twitter-title', $post->title)
@section('og-description', $post->meta_description)
@section('twitter-description', $post->meta_description)
@section('title', \App\Models\Settings::blogTitle().' | '.$post->title)
@if ($post->page_image)
    @section('og-image', url( $post->page_image ))
    @section('twitter-image', url( $post->page_image ))
@endif

@section('content')
    <article>
        <div class="post-detail">
        <div class="container" id="post">
            <div class="">
                <div class="">
                    @if ($post->page_image)
                        <div class="text-center">
                            <img src="{{ asset($post->page_image) }}" class="post-hero">
                        </div>
                    @endif
                    <h1 class="post-page-title">{{ $post->title }}</h1>
                    <p class="post-page-meta">
                        <time>{{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</time>
                        @if ($post->tags->count())
                            <br>
                            {!! join(' ', $post->tagLinks()) !!}
                        @endif
                    </p>

                    <div class="post-content">
                        {!! $post->content_html !!}
                    </div>

                    <p class="dts"><span>&#183;</span><span>&#183;</span><span>&#183;</span></p>

                    @include('frontend.blog.partials.author')

                </div>
            </div>
        </div>
        </div>
    </article>

    @include('frontend.blog.partials.paginate-post')
@stop

@section('unique-js')
    <script src="/js/new-frontend.js" charset="utf-8"></script>
@endsection
