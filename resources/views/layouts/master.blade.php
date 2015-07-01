<?php
$show_right_portrait = true;
$show_facebook = true;
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>North London Yoga,N4, Yoga Ground, UK: Kevin Saunders</title>
    <link href="/css/yoga_style.css" rel="stylesheet" media="(orientation: landscape)" type="text/css" />
    <link href="/css/mobile_portrait.css" rel="stylesheet" media="(orientation: portrait)" type="text/css" />
    <meta name="keywords" content="Yoga,Hatha,North, Meridian,Energy,London,Relaxation,Release,Muscle,Injury Prevention,Joint,Healing" />
    <meta name="description" content="Hatha yoga influenced by okido yoga, Alexander technique and shiatsu." />

</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div id="container_centre">
    <section id="container">
        <header>
            <a href="/index.php"><img src="/images/headers.jpg" id="header_image" alt="" width="1000" height="183" border="0" /></a>
        </header>

        <aside id="side_bar"><img src="/images/left_spacer.jpg" alt="" width="75" height="383" /></aside>
        <nav id="left_bar" >
            @include('layouts.menu')
            <p id="menu_bottom_separator"><img src="/images/greenline.jpg" alt="" width="194" height="17" /></p>
            <p id="menu_bottom_image"><img src="{{$left_image}}" alt="" width="194" height="323" /></p>
        </nav>

        <article id="content">
            @yield('content')
        </article>

        <aside id="right_bar" >
            @include('layouts.right')
        </aside>
        <aside id="side_bar_right"><img src="/images/right_spacer.jpg" alt="" width="76" height="396" /></aside>

    </section>
    <br clear="left" />
    <footer>
        Contact me: 07815 797 645&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&copy; Kevin Saunders 2015.&nbsp;&nbsp;
    </footer>
</div>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-37758212-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
</body>
</html>