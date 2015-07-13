<?php

namespace App\Listeners;

use App\Events\ContactEvent;
use App\Student;
use Illuminate\Contracts\Mail\Mailer;
use App\SmsTrait;

class ContactListener
{
    use SmsTrait;
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  ContactEvent $event
     * @return void
     */
    public function handle(ContactEvent $event)
    {
        $name = $event->getRequest()->get('name');
        $email = $event->getRequest()->get('email');
        $phone = $event->getRequest()->get('phone');
        $comments = $event->getRequest()->get('comments');
        $newsletter = $event->getRequest()->get('newsletter');

        //Add contact to wordpress newsletter
        if($newsletter == 'newsletter'){
            $newsletter_class =  Student::create($event->getRequest()->all());
            $newsletter_class->status = 'C';
            $newsletter_class->save();
        }

        $this->mailer->send('emails.contact', compact('name'), function ($message) use ($email, $name) {
            $message->to($email, $name);
            $message->from('kevin@yogaground', 'Yogaground')
                ->subject('Thanks for contacting Yogaground');
        });

        $this->mailer->send('emails.admin_contact', compact('name', 'email', 'phone', 'comments'),
            function ($message) use ($email, $name) {
                $message->from($email, $name);
                $message->to('kevin@yogaground', 'Yogaground')
                    ->subject('Contact from yogaground');
            });

        $this->sms($name, $phone, $comments);
    }


}
