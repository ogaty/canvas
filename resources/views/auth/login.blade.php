@extends('backend.layout')

@section('title')
    <title>{{ \Easel\Models\Settings::blogTitle() }} | Sign In</title>
@stop

@section('login')
    <div class="login-container">
        @include('backend.shared.partials.errors')
        @include('auth.partials.form')
    </div>
@endsection

@section('unique-js')
    @include('backend.shared.components.show-password', ['inputs' => 'input[name="password"]'])
@stop
