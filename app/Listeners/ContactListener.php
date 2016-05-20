<?php
/**
 * @author Kevin Saunders
 */
namespace App\Listeners;

use App\Events\ContactEvent;
use App\Models\EmailsReceived;
use App\Models\Student;
use Illuminate\Contracts\Mail\Mailer;
use App\Helpers\SmsTrait;
use Illuminate\Support\Facades\Config;

/**
 * Contact Listener
 * Class ContactListener
 * @package App\Listeners
 */
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

        $this->saveUser($event, $newsletter,$name,$email);
        $this->saveReceivedEmail($event);

        $email_from = env('MAIL_FROM');
        $email_from_name = env('MAIL_FROM_NAME');
        $this->sendEmails($name, $email, $email_from, $email_from_name, $phone, $comments);

        $this->sms($name, $phone, $comments);
    }

    /**
     * @param $name
     * @param $email
     * @param $email_from
     * @param $email_from_name
     * @param $phone
     * @param $comments
     */
    private function sendEmails($name, $email, $email_from, $email_from_name, $phone, $comments)
    {
        $this->mailer->send('emails.contact', compact('name'), function ($message) use ($email, $name, $email_from, $email_from_name) {
            $message->to($email, $name);
            $message->from('kevin@yogaground.com', $email_from_name)
                ->subject('Thanks for contacting Yogaground');
        });

        $this->mailer->send('emails.admin_contact', compact('name', 'email', 'phone', 'comments'),
            function ($message) use ($email, $name, $email_from, $email_from_name) {
                $message->from($email, $name);
                $message->to($email_from, $email_from_name)
                    ->subject('Contact from yogaground');
            });
    }

    /**
     * Add contact to wordpress newsletter
     * @param ContactEvent $event
     * @param $newsletter string
     * @param $name string
     * @param $email string
     */
    private function saveUser(ContactEvent $event, $newsletter,$name,$email)
    {
        if ($newsletter != 'newsletter') {
            return;
        }

        if(Student::isStudent($name,$email)){
            return;
        }

        $newsletter_class = Student::create($event->getRequest()->all());
        $newsletter_class->status = 'C';
        $newsletter_class->save();
    }

    /**
     * Save the received email
     * @param ContactEvent $event
     */
    private function saveReceivedEmail(ContactEvent $event)
    {
        $email_received = EmailsReceived::create($event->getRequest()->all());
        $email_received->edate = date('Y-m-d H:i:s');
        $email_received->sms_sent = true;
        $email_received->save();
    }


}
