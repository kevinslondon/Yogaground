<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{$title}}</title>
    <link href="/css/yoga_style.css" rel="stylesheet" media="(orientation: landscape)" type="text/css" />
    <link href="/css/mobile_portrait.css" rel="stylesheet" media="(orientation: portrait)" type="text/css" />
    <meta name="keywords" content="{{env('HTML_KEYWORDS')}}" />
    <meta name="description" content="{{env('HTML_DESCRIPTION')}}" />

</head>

<body>


<div id="container_centre">

        <header>
            <a href="/"><img src="/images/headers.jpg" id="header_image" alt="" width="1000" height="183" border="0" /></a>
            @if(!$hide_side_bar_mailchimp)
                @include('layouts.mailslim')
            @endif
        </header>

        <aside id="side_bar"><img src="/images/left_spacer.jpg" alt="" width="75" height="383" /></aside>
        <nav>
            @include('layouts.menu')
            <!-- reduce clutter on left hand menu
            <p id="menu_bottom_separator"><img src="/images/greenline.jpg" alt="" width="194" height="17" /></p>
            <p id="menu_bottom_image"><img src="{{$left_image}}" alt="" width="194" height="323" /></p>
            -->
        </nav>

        <article id="content">
            @yield('content')
        </article>

        @if($include_right)
        <aside id="right_bar" >
            @include('layouts.right')
        </aside>
        {{--<aside id="side_bar_right"><img src="/images/right_spacer.jpg" alt="" width="75" height="396" /></aside>--}}
        @endif


    <br clear="left" />
    <footer>
       {{env('FOOTER_TEXT')}}
    </footer>
</div>

@include('layouts.google')
</body>
</html>