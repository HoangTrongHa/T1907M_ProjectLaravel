<!DOCTYPE html>
<html lang="zxx">
<head>
@include('fontend.components.head')
</head>
<body>
<div id="preloder">
    <div class="loader"></div>
</div>
<div class="humberger__menu__overlay"></div>
@include("fontend.components.humber_menu_wrapper")
<!-- Header Section Begin -->
@include("fontend.components.header")<!-- Header Section End -->
<!-- Hero Section Begin -->
<!-- Hero Section End -->
@yield("contents")
<!-- Categories Section Begin -->
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<!-- Featured Section End -->

<!-- Banner Begin -->
<!-- Latest Product Section Begin -->
<!-- Blog Section Begin -->
<!-- Blog Section End -->

<!-- Footer Section Begin -->
@include("fontend.components.footer")
@include("fontend.components.script")

</body>

</html>
