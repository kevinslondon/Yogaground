<?php

namespace App\Listeners;

//use app\EmailsReceived;
use App\Events\ContactEvent;
use App\Models\Student;
use Illuminate\Contracts\Mail\Mailer;
use App\SmsTrait;
use Illuminate\Support\Facades\Config;

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

        /*
         * $email_received = EmailsReceived::create($event->getRequest()->all());
        $email_received->edate = date('Y-m-d H:i:s');
        $email_received->sms_sent = true;
        $email_received->save();*/

        $email_from = env('MAIL_FROM');
        $email_from_name = env('MAIL_FROM_NAME');


        $this->mailer->send('emails.contact', compact('name'), function ($message) use ($email, $name,$email_from,$email_from_name) {
            $message->to($email, $name);
            $message->from('kevin@yogaground.com', $email_from_name)
                ->subject('Thanks for contacting Yogaground');
        });

        $this->mailer->send('emails.admin_contact', compact('name', 'email', 'phone', 'comments'),
            function ($message) use ($email, $name,$email_from,$email_from_name) {
                $message->from($email, $name);
                $message->to($email_from, $email_from_name)
                    ->subject('Contact from yogaground');
            });

        $this->sms($name, $phone, $comments);
    }


}
