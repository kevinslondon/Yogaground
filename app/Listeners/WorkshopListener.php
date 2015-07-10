<?php

namespace App\Listeners;

use App\Events\WorkshopEvent;
use App\Newsletter;
use App\Workshop;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;


class WorkshopListener
{
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
        $user = new Newsletter();
        $workshop = $event->getWorkshop();
        $user->fill($request);
        $user->status = 'C';
        $user->save();

        $user->workshops()->attach($workshop->id, ['sign_date'=>date('Y-m-d H:i:s')]);

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
    }
}
