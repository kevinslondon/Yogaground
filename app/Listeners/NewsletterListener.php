<?php
/**
 * @author Kevin Saunders
 * Date: 18/04/2018
 */

namespace App\Listeners;


use App\Events\NewsletterEvent;


class NewsletterListener
{

    use MailchimpTrait;



    /**
     * Handle the event.
     *
     * @param  NewsletterEvent $event
     * @return void
     */
    public function handle(NewsletterEvent $event)
    {

        $name = '';
        if($event->getRequest()->has('FNAME')){
            $name = $event->getRequest()->get('FNAME');
        }

        $surname = '';
        if($event->getRequest()->has('LNAME')){
            $surname = $event->getRequest()->get('LNAME');
        }

        $email = $event->getRequest()->get('EMAIL');


        $this->addEmailToMailchimpList($email,$name,$surname);


    }

}