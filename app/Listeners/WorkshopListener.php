<?php

namespace App\Listeners;

use App\Events\WorkshopEvent;
use App\Student;
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
        if(!$user->isStudent($event->getRequest()->get('name'),$event->getRequest()->get('email'))){
            $user->fill($request);
            $user->status = 'C';
            $user->profile = $this->getProfile($request);
            $user->save();
        }else {
            $user = $user->getByEmailAndName($event->getRequest()->get('name'),$event->getRequest()->get('email'));
        }


        if(!$user->isRegistered($user->name,$user->email, $workshop->id)){
            $user->workshops()->attach($workshop->id, ['sign_date'=>date('Y-m-d H:i:s')]);
        }

        $name = $event->getRequest()->get('name');
        $email = $event->getRequest()->get('email');

        $this->mailer->send('emails.lesson', compact('name','workshop'), function ($message) use ($email, $name) {
            $message->to($email, $name);
            $message->from('kevin@yogaground', 'Yogaground')
                ->subject('Thanks for signing up to the yoga class');
        });

        $this->mailer->send('emails.lesson_admin', compact('name', 'email','request'),
            function ($message) use ($email, $name) {
                $message->from($email, $name);
                $message->to('kevin@yogaground', 'Yogaground')
                    ->subject('Lesson signup from yogaground');
            });

        $this->sms($name, $request['phone'], 'Lesson sign up '.$this->getProfile($request));
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
