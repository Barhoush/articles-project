<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="author" content="Steve Smith">
    <title>Barhoush Articles</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/apple-touch-icon.png') }}" />
    <script src="{{ asset('js/scale.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

</head>
<body>
<div class="topnav" id="myTopnav">
    @php
        $menu   =   Session::get('menu');
    @endphp
    <a href="/" class="menu-item">Home</a>
    @if($menu)
        @foreach($menu   as  $item)
            <a class="menu-item" href="{{ route('articles.home',  ['category'   =>  $item->slice]) }}">{{ $item->name }}</a>
        @endforeach
    @endif
</div>
<div class="content">
    <header>
        <h2><a href="/">barhoush<span>articles</span></a></h2>
        <p>written by <a href="https://www.linkedin.com/in/mbarhoush/" target="_blank">Mohammad Barhoush</a></p>
    </header>


    @yield('content')

    <footer>
        <p>Copyright &copy; 2017 Mohammad Barhoush. All Rights Reserved.</p>
    </footer>
    <!--[if !IE]><script>fixScale(document);</script><!--<![endif]-->
    <script type="text/javascript">
        $(document).ready(function () {

        })
    </script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</div>
</body>
</html>
