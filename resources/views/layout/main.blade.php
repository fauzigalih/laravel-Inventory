<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    {!! HTML::favicon('static/images/logo.png') !!}
    <title>@yield('title') - {{ config('app.name') }}</title>
    {!! HTML::style('css/custom.css') !!}
    {!! HTML::style('css/style.css') !!}
    {!! HTML::script('https://kit.fontawesome.com/4176fb7d63.js') !!}
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
    <div>
        <div class="sidebar">
            <div class="sidebar-inner">
                <div class="sidebar-logo">
                    <div class="peers ai-c fxw-nw">
                        <div class="peer peer-greed">
                            <a class="sidebar-link td-n" href="{{ url('/') }}">
                                <div class="peers ai-c fxw-nw">
                                    <div class="peer">
                                        <div class="logo">
                                            {{ HTML::image('static/images/logo.png', '...') }}
                                        </div>
                                    </div>
                                    <div class="peer peer-greed">
                                        <h5 class="lh-1 mB-0 logo-text">{!! config('app.name') !!}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="peer">
                            <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
                        </div>
                    </div>
                </div>
                <ul class="sidebar-menu scrollable pos-r">
                    <li class="nav-item mT-30 actived"><a class="sidebar-link" href="{{ url('/') }}"><span class="icon-holder"><i class="c-light-blue-500 ti-home"></i> </span><span class="title">Dashboard</span></a></li>
                    <li class="nav-item"><a class="sidebar-link" href="{{ url('product') }}"><span class="icon-holder"><i class="c-orange-500 ti-package"></i> </span><span class="title">Product</span></a></li>
                    <li class="nav-item"><a class="sidebar-link" href="{{ url('product-in') }}"><span class="icon-holder"><i class="c-green-500 ti-import"></i> </span><span class="title">Product In</span></a></li>
                    <li class="nav-item"><a class="sidebar-link" href="{{ url('product-out') }}"><span class="icon-holder"><i class="c-red-500 ti-export"></i> </span><span class="title">Product Out</span></a></li>
                    <li class="nav-item"><a class="sidebar-link" href="{{ url('Transaction') }}"><span class="icon-holder"><i class="c-purple-500 ti-exchange-vertical"></i> </span><span class="title">Transaction</span></a></li>
                </ul>
            </div>
        </div>
        <div class="page-container">
            <div class="header navbar">
                <div class="header-container">
                    <ul class="nav-left">
                        <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
                        <li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);"><i class="search-icon ti-search pdd-right-10"></i> <i class="search-icon-close ti-close pdd-right-10"></i></a></li>
                        <li class="search-input"><input class="form-control" type="text" placeholder="Search..."></li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                                <div class="peer mR-10">
                                    {{ HTML::image('https://randomuser.me/api/portraits/men/10.jpg', '...', ['class' => 'w-2r bdrs-50p']) }}
                                </div>
                                <div class="peer"><span class="fsz-sm c-grey-900">John Doe</span></div>
                            </a>
                            <ul class="dropdown-menu fsz-sm">
                                <li><a href="{{ url('/') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    @yield('content')
                </div>
            </main>
            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                <span>
                    Copyright © 2020 <a href="https://www.instagram.com/fauzigalihajisaputro/">Fauzi Galih</a> and Designed by <a href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a>. All rights
                    reserved.
                </span>
            </footer>
        </div>
    </div>
    {!! HTML::script('js/vendor.js') !!}
    {!! HTML::script('js/bundle.js') !!}
</body>
</html>