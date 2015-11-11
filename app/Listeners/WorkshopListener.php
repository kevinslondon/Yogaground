<?php

namespace App\Listeners;

use App\Events\WorkshopEvent;
use App\Models\Student;
use Illuminate\Contracts\Mail\Mailer;
use App\SmsTrait;



class WorkshopListener
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
     * @param  WorkshopEvent  $event
     * @return void
     */
    public function handle(WorkshopEvent $event)
    {
        $request = $event->getRequest()->all();
        $user = new Student();
        $workshop = $event->getWorkshop();

        $name = $event->getRequest()->get('name');
        $email = $event->getRequest()->get('email');

        if(!$user->isStudent($name,$email)){
            $user->fill($request);
            $user->status = 'C';
            $user->profile = $this->getProfile($request);
            $user->save();
        }else {
            $user = $user->getByEmailAndName($name,$email);
        }


        if(!$user->isRegistered($name,$email, $workshop->id)){
            $user->workshops()->attach($workshop->id, ['sign_date'=>date('Y-m-d H:i:s')]);
        }

        $from = env('MAIL_FROM');
        $from_name = env('MAIL_FROM_NAME');

        $this->mailer->send('emails.lesson', compact('name','workshop'), function ($message) use ($email, $name, $from,$from_name) {
            $message->to($email, $name);
            $message->from($from,$from_name)
                ->subject(trans('site.sign_up_email_subject'));
        });

        $this->mailer->send('emails.lesson_admin', compact('name', 'email','request'),
            function ($message) use ($email, $name, $from,$from_name) {
                $message->from($email, $name);
                $message->to($from,$from_name)
                    ->subject(trans('site.sign_up_admin_email_subject'));
            });

        $this->sms($name, $request['phone'], trans('site.sms_signup_text').$this->getProfile($request));
    }

    private function getProfile($request)
    {
        $profile = '';
        foreach($request as $name=>$field){
            $profile .= $name. ': '.$field.PHP_EOL;
        }
        return $profile;
    }
}
