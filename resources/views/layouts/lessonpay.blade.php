<p>If you want to guarantee your place in the class, please use the form below to pay for the class in advance
    ( &pound;{{$page_workshop->getFee() }} )</p>
{!!$page_workshop->getPayPalButton() !!}

@if($page_workshop->getOfferExpireDate() && !$page_workshop->isOfferPassed())
    <p>The offer expires on <strong>{{$page_workshop->getOfferExpireDate()}},
        after this it will cost &pound;{{$page_workshop->fullfee}}</strong></p>
@endif

@if($page_workshop->deposit > 0 )
    <p>&nbsp;</p>
    <p>You can also pay a deposit &pound;{{$page_workshop->deposit }} which will guarantee your place. The balance of
        &pound;{{$page_workshop->getFee() - $page_workshop->deposit }} is payable in the class</p>
    {!!$page_workshop->paypal_deposit  !!}
@endif
<p>&nbsp;</p>
<p>You can also pay the full fee of &pound;{{$page_workshop->fullfee }} in the class</p>
<p>I look forward to seeing you in the class.</p>
<p>Kevin </p>