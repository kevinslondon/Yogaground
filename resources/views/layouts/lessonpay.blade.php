
<p>If you want to guarantee your place in the class, please use the form below to pay for the class in advance
    ( &pound;{{$page_workshop->fullfee }} )</p>
{!!$page_workshop->paypal_fullfee !!}

@if($page_workshop->deposit > 0 )
    <p>&nbsp;</p>
    <p>You can also pay a deposit &pound;{{$page_workshop->deposit }} which will guarantee your place. The balance of
        &pound;{{$page_workshop->fullfee - $page_workshop->deposit }} is payable on the first class</p>
    {!!$page_workshop->paypal_deposit  !!}
@endif
<p>&nbsp;</p>
<p>You can also pay the full fee of &pound;{{$page_workshop->fullfee }} in the class</p>
<p>I look forward to seeing you in the class.</p>
<p>Kevin </p>