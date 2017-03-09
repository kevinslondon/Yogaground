@extends('layouts.master')


@section('content')
    <h1>FREE 5-DAY COURSE! 5-days towards pain free shoulders</h1>

    <!-- Begin MailChimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <div id="mc_embed_signup">
        <form action="//yogaground.us9.list-manage.com/subscribe/post?u={{$mail_chimp_u}}&amp;id={{$mail_chimp_id}}" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">

                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                <div class="mc-field-group">
                    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                    </label>
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                </div>
                <div class="mc-field-group">
                    <label for="mce-FNAME">First Name </label>
                    <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                </div>
                <div class="mc-field-group">
                    <label for="mce-LNAME">Last Name </label>
                    <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                </div>
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_cf7504563a797f6fcfc935c15_c47245e2ed" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
    </div>
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
    <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
    <!--End mc_embed_signup-->

    <p>I send out newsletters giving tips, articles and details of classes and workshops.
    Your email is kept completely confidential.</p>

    <h2>About the 5-part course on your shoulders</h2>
    <p>Our shoulders are very complex areas of expression, strength and emotion. We ask a lot from our shoulders, in some ways, more than any other generation. We ask that our shoulders express our strength through ability to hold, to lift, to pull in daily physical activities and structured exercise.</p>

    <p>At the same time, we want to spend many hours on activities which require fine co-ordination – playing an instrument, using a tablet, a laptop or smartphone. Then as a society, we are expecting ever greater awareness and sensitivity in our communication.</p>

    <p><strong>Our shoulders express our moods, our strengths and our connection to people, to things.</strong></p>

    <p>No wonder that shoulder, arm and wrist complications are now common.</p>

    <p>I work on shoulders, both my own and other people’s day in and day out. The more I discover about this amazing area of our body, the more respect I have for the processes which allow us to keep these important areas free and unblocked.</p>

    <p>So, whether you just want to relax your shoulders more, or you want to do chataranga in your yoga practice, play a musical instrument better or work at a computer, this 5-day course is for you!</p>

@endsection