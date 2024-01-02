@extends('layouts.app')
@section('title', 'User Login')

@section('content')
    @include('components.login-form')

    <script>
        (async () => {
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })();
    </script>
@endsection
