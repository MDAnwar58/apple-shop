@extends('layouts.app')
@section('title', 'Policy')

@section('content')
    @include('components.PolicyList')
    @include('components.top-brands')
    <script>
        (async () => {
            await category();
            await Policy();
            await Brands();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })();
    </script>
@endsection