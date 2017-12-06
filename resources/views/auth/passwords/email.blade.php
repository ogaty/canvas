@extends('backend.layout')

@section('title')
    <title>{{ \Easel\Models\Settings::blogTitle() }} | Forgot Password</title>
@stop

@section('login')
    <div class="login-container">
        @include('backend.shared.partials.errors')
        @include('auth.passwords.partials.email-form')
    </div>
@endsection

@section('unique-js')
    @include('backend.shared.components.show-password', ['inputs' => 'input[name="password"]'])
@stop
