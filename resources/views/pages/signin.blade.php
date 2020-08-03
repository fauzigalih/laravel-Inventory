<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    {!! HTML::favicon('static/images/logo.png') !!}
    <title>Sign In</title>
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
            <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
            <form action="{{ url('/') }}" method="GET">
                <div class="form-group"><label class="text-normal text-dark">Username</label> <input type="email" class="form-control" placeholder="John Doe"></div>
                <div class="form-group"><label class="text-normal text-dark">Password</label> <input type="password" class="form-control" placeholder="Password"></div>
                <div class="form-group">
                    <div class="peers ai-c jc-sb fxw-nw">
                        <div class="peer">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c"><input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer"> <label for="inputCall1" class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">Remember Me</span></label></div>
                        </div>
                        <div class="peer"><button class="btn btn-primary">Login</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {!! HTML::script('js/vendor.js') !!}
    {!! HTML::script('js/bundle.js') !!}
</body>
</html>