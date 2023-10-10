<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet"  href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet"  href="{{asset('css/bootstrap-icons.css')}}">
</head>
<body>
    @yield('main')
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script>
        var toast = document.getElementById('myToast');
        var toastInstance = new bootstrap.Toast(toast);
        toastInstance.show();
    </script>
</body>
</html>
