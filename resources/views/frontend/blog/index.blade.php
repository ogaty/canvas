@extends('frontend.layout')

@if (isset($tag->title))
    @section('title', \App\Models\Settings::blogTitle().' | '.$tag->title)
@else
    @section('title', \App\Models\Settings::blogTitle().' | Blog')
@endif
@section('og-title', \App\Models\Settings::blogTitle())
@section('twitter-title', \App\Models\Settings::blogTitle())
@section('og-description', \App\Models\Settings::blogDescription())
@section('twitter-description', \App\Models\Settings::blogDescription())

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @include('frontend.blog.partials.tag')
                @include('frontend.blog.partials.posts')
                @include('frontend.blog.partials.paginate-index')
            </div>
        </div>
    </div>
@stop

@section('unique-js')
    <script src="/vendor/canvas/assets/js/frontend.js" charset="utf-8"></script>
@endsection
