<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite("resources/css/admin.css")
    @stack("style")
</head>
<body>
    @include('admin._components.sidebar')
    <div class="main">
        @yield('conteudo')
    </div>

    @stack("script")
</body>
</html>
