<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mikhayla Kain - {{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/general.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @yield('cssPage')
</head>
<body>
    @include('components.organisms.navbar')

    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('components.organisms.sidebar')
            <div class="col py-3 content-bg">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/css/bootstrap.bundle.min.js') }}"></script>
    @yield('scriptPage')
</body>
</html>
