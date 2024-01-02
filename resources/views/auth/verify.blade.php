@extends('layouts.app')
@section('title', 'User Login')

@section('content')
    @include('components.verify-form')

    <script>
        (async () => {
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })();
    </script>
@endsection
