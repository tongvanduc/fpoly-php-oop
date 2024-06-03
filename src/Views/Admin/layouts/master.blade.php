<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="mt-5">
            <a href="{{ url('admin') }}">Dashboard</a>
            <a href="{{ url('admin/products') }}">Quản lý Sản phẩm</a>
        </nav>

        <h1 class="mt-5 mb-3 text-center">@yield('title')</h1>
        
        <div class="row">
            @yield('content')
        </div>
    </div>

</body>

</html>
