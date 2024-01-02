@extends('layouts.app')

@section('content')
<!--==================== hero banner start ====================-->
@include('components.hero')
<!--==================== hero banner end ====================-->

<!--==================== featured end ====================-->
@include('components.top-category')
<!--==================== featured end ====================-->

<!--==================== featured product start ====================-->
@include('components.exclusive-product')
<!--==================== featured product end ====================-->

@include('components.top-brands')

<script>
    (async () => {
        await category();
        await Hero();
        await Category();
        await Popular();
        await Brands();
        $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        await New();
        await Top();
        await Special();
        await Tranding();
    })();
</script>
@endsection
