@extends("fontend.layout",["categories"=>$categories])
@section("contents")
    @include("fontend.components.session_hero",["categories"=>$categories])
    @include("fontend.components.session_category")
    @include("fontend.components.session_featured")
    @include("fontend.components.banner")<!-- Banner End -->
    @include("fontend.components.latest_product")<!-- Latest Product Section End -->
    @include("fontend.components.from_blog")

@endsection
