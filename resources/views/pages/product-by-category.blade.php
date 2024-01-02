@extends('layouts.app')
@section('title', 'product-by-category')

@section('content')
    @include('components.ByCategoryList')
    @include('components.top-brands')
    <script>
        (async () => {
            await category();
            await Bycategory();
            await Brands();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })();
    </script>
@endsection
