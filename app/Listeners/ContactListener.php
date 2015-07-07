<?php

namespace App\Listeners;

use App\Events\ContactEvent;
use App\Newsletter;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

class ContactListener
{
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
            $newsletter_class =  Newsletter::create($event->getRequest()->all());
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

    private function sms($name, $phone, $comments)
    {
        if ($_ENV['APP_ENV']=='local' || $_ENV['APP_ENV']=='testing') {
            return;
        }

        $user = $_ENV['SMS_USER'];
        $pass = $_ENV['SMS_PASS'];
        $sms_phone = $_ENV['SMS_PHONE'];

        date_default_timezone_set('Europe/London');
        $datetime = new \DateTime();
        $h = $datetime->format('H');
        if ($h < 23 && $h > 7) {
            $url = "http://www.kapow.co.uk/scripts/sendsms.php";
            $post = array(
                'username' => $user,
                'password' => $pass,
                'mobile' => $sms_phone,
                'sms' => 'YG, ' . $name . ', ' . $phone . ': ' . substr($comments, 0, 120)
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_NOPROGRESS, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $response = curl_exec($ch);
        }

    }
}
