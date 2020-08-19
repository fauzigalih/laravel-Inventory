<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! HTML::favicon('static/images/logo.png') !!}
    <title>@yield('title') - {{ config('app.name') }}</title>
    {!! HTML::style('css/custom.css') !!}
    {!! HTML::style('css/style.css') !!}
</head>
<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
        window.addEventListener('load', function load() {
            const loader = document.getElementById('loader');
            setTimeout(function () {
                loader.classList.add('fadeOut');
            }, 300);
        });
    </script>
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image: url({{ URL::asset('static/images/bg.jpg') }})">
            <div class="pos-a centerXY">
                <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px">{{ HTML::image('static/images/logo.png', '...', ['class' => 'pos-a centerXY']) }}</div>
            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
            @yield('content')
        </div>
    </div>
    {!! HTML::script('js/vendor.js') !!}
    {!! HTML::script('js/bundle.js') !!}
</body>
</html>