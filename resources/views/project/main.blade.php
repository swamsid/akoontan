
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>akoontan | @yield('title')</title>
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        @include('project.partials._sidebar')

        <div id="page-wrapper" class="gray-bg">
            @include('project.partials._navbar')

            <div class="wrapper wrapper-content">
                Hallo
            </div>

            @include('project.partials._footer')

        </div>

        @include('project.partials._rightsidebar')

    </div>

    <script src="{{ asset('public/js/app.js') }}"></script>
</body>
</html>
