@extends('layouts.app')
@section('title', 'Product Details')

@section('content')
    @include('components.ProductDetails')
    @include('components.top-brands')
    
    <script>
        (async () => {
            await category();
            await productDetails();
            await Brands();
            $(".preloader").delay(10).fadeOut(10).addClass('loaded');
        })();
    </script>
@endsection