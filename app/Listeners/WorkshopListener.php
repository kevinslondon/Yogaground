<?php

namespace App\Listeners;

use App\Events\WorkshopEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WorkshopListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WorkshopEvent  $event
     * @return void
     */
    public function handle(WorkshopEvent $event)
    {

    }
}
