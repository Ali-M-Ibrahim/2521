<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My website</title>
    <link rel="stylesheet" href="{{asset('css/nav.css')}}" />
</head>
<body>
<nav class="navbar">
    <!-- Website Logo -->
    <div class="logo">BrandName</div>
    <!-- Navigation Links -->
    <ul class="nav-links">
        <li><a href="#" class="active">Page1 </a></li>
        <li><a href="#">Page 2</a></li>

    </ul>
</nav>

@yield('title')
{{--dynamic content--}}
@yield('app-content')


<!-- Semantic Footer Section -->
<footer class="site-footer">

    <!-- Bottom Copyright Bar -->
    <div class="footer-bottom">
        <p>&copy; 2026 Your Brand Name. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
