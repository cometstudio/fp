<!-- (.)(.) -->
<!DOCTYPE html>
<html>

<head lang="ru">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=9">
    <meta content="width=1280,maximum-scale=1.0" name="viewport">
    <title>{{ $title or 'Hello!' }}</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <link rel="stylesheet" type="text/css" href="/css/{{ $css or 'index' }}.css" />
    <link rel="stylesheet" type="text/css" href="/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/bower_components/fullpage.js/jquery.fullPage.css" />
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/bower_components/lt-ie-9/lt-ie-9.min.js"></script>
    <![endif]-->
    <link rel="icon" type="image/ico" href="favicon.ico" />
</head>

<body>

<div class="header section">
    <div class="wrapper clearfix">
        <a href="/" class="logo-tag">#longtag</a>
    </div>
</div>

@yield('content')

<div class="footer section">
    <div class="wrapper clearfix">
        <div class="grid">
            <div class="x2 row">
                <div class="column">
                    <a href="/" class="logo-tag">#longtag</a>
                </div>
                <div class="column">
                    <nav class="social-icons">
                        <a href="/" class="fa fa-instagram"></a>
                        <a href="/" class="fa fa-youtube-square"></a>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="/bower_components/jquery-form/jquery.form.js"></script>
<script src="/bower_components/cookie/cookie.min.js"></script>
<script src="/bower_components/fullpage.js/jquery.fullPage.min.js"></script>
<script src="/js/js.js"></script>
</body>
</html>