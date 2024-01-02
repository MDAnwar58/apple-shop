@extends('layouts.app')

@section('content')
    
    @include('components.WishList')

    @include('components.top-brands')

    <script>
         (async () => {
            await category();
            await WishList();
            await Brands();
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })();
    </script>
@endsection
