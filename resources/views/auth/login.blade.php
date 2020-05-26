@extends('layouts.auth')

@section('title')
    Login -
@endsection

@section('content')
    <div class="az-signin-wrapper" id="app">
        <div class="az-card-signin">
            <div class="az-signin-header">
                @include('_tools.alert')
                @php($prefix = 'loginForm')
                <form action="{{ route('login.process') }}" method="post" id="{{ $prefix }}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                    @include('_tools.form', [
                        'prefix' => $prefix,
                        'type' => 'email',
                        'name' => 'email',
                        'caption' => 'Email',
                        'value' => old('email'),
                        'placeholder' => 'Masukan Email',
                    ])
                    @include('_tools.form', [
                        'prefix' => $prefix,
                        'type' => 'password',
                        'name' => 'password',
                        'caption' => 'Password',
                        'placeholder' => 'Masukan password',
                    ])
                    @include('_tools.form', [
                        'prefix' => $prefix,
                        'type' => 'checkbox',
                        'name' => 'remember',
                        'caption' => 'Simpan Login',
                    ])
                    <button type="submit" class="btn btn-az-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
