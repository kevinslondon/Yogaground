<?php
/**
 * Mailchimp newsletter event
 * @author Kevin Saunders
 * Date: 18/04/2018
 */

namespace App\Events;

use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class NewsletterEvent extends Event
{
    use SerializesModels;

    /**
     * @var Request
     */
    private $request;



    /**
     * WorkshopEvent constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

}