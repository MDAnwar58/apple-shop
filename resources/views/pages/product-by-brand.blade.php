@extends('layouts.app')
@section('title', 'product-by-brand')

@section('content')
    @include('components.ByBrandList')
    @include('components.top-brands')
    <script>
        (async () => {
            await category();
            await ByBrands();
            await Brands();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })();
    </script>
@endsection
