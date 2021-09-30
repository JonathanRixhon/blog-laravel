<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <link rel="stylesheet" href="/app.css">
    {{$title}}
</head>
<body>
<nav>
    <ul>
        <li>
            <a href="/categories">Catégories</a>
        </li>
        <li>
            <a href="/">Posts</a>
        </li>
    </ul>
</nav>
{{$mainContent}}
</body>
</html>
