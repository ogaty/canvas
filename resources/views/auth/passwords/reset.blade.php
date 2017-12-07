@extends('backend.layout')

@section('title')
    <title>{{ \App\Models\Settings::blogTitle() }} | Reset Password</title>
@stop

@section('login')
    <div class="login-container">
        @include('backend.shared.partials.errors')
        @include('auth.passwords.partials.reset-form')
    </div>
@endsection

@section('unique-js')
    @include('backend.shared.components.show-password', ['inputs' => 'input[name="password"]'])
@stop
