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
use Mailchimp;

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

    /**
     * @var Mailchimp
     */
    private $mailchimp;

    private $firstname;
    private $lastname;

    /**
     * ContactListener constructor.
     * @param Mailer $mailer
     * @param Mailchimp $mailchimp
     */
    public function __construct(Mailer $mailer, Mailchimp $mailchimp)
    {
        $this->mailer = $mailer;
        $this->mailchimp = $mailchimp;
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

        $this->name_split($name);
        $this->addEmailToList($email,$name);

        if(Student::isStudent($name,$email)){
            return;
        }

        $newsletter_class = Student::create($event->getRequest()->all());
        $newsletter_class->status = 'C';
        $newsletter_class->save();

    }

    /**
     * Access the mailchimp lists API
     * for more info check "https://apidocs.mailchimp.com/api/2.0/lists/subscribe.php"
     */
    private function addEmailToList($email,$name)
    {
        $list_id = env('MAILCHIMP_ID');
        try {
            $this->mailchimp
                ->lists
                ->subscribe(
                    $list_id,
                    ['email' => $email],
                    ['FNAME' =>$this->firstname, 'LNAME'=>$this->lastname]
                );
        } catch (\Mailchimp_List_AlreadySubscribed $e) {
            echo $e->getMessage();
            echo $e->getTraceAsString();
        } catch (\Mailchimp_Error $e) {
            echo $e->getMessage();
            echo $e->getTraceAsString();

        }
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

    private function name_split($name)
    {
        $name_array = preg_split('/\s+/', $name);
        if(count($name_array) < 2){
            $this->firstname = $name;
            $this->lastname = '';
            return;
        }

        $this->firstname = $name_array[0];
        $this->lastname = implode(' ', array_slice($name_array, 1));
    }


}
