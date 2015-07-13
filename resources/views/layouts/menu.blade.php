<h2 class="menu_link"><a href="/" title="Yoga Ground Home">Home</a></h2>
<h2 class="menu_link"><a href="/about" title="About Yoga Ground">About Yoga Ground</a></h2>
<h2 class="menu_link"><a href="/lessons" title="Lessons at Yoga Ground">Lessons</a></h2>
<h2 class="menu_link"><a href="/workshops" title="Workshops at Yoga Ground">Workshops</a></h2>
<h2 class="menu_link"><a href="/yoga_one_to_one" title="One to one yoga lessons at yoga ground">One to ones</a></h2>
<h2 class="menu_link"><a href="/contact" title="Contact Yoga Ground">Contact Yoga Ground</a></h2>
<h2 class="menu_link"><a href="/reviews" title="Testimonials / Reviews">Testimonials</a></h2>
<h2 class="menu_link"><a href="/blog/" title="Yoga Ground Blog">Blog</a></h2>
@foreach($blog_menu as $blog)
    <h2 class="menu_link_sub"><a href="{{$blog->guid}}">{{$blog->post_title}}</a></h2>
@endforeach
