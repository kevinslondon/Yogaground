<?php
/**
 * @author Kevin Saunders
 * Date: 24/06/2015
 */

namespace App\Http\Controllers;


use App\Events\ContactEvent;
use App\Page;
use Illuminate\Http\Request;
use App\Reviews;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller {

    /**
     * @var Page
     */
    private $page;

    private $review;

    function __construct(Page $page, Reviews $review)
    {
        $this->page = $page;
        $this->review = $review;
    }


    /**
     * Home page
     * @param $url String
     * @return \Illuminate\View\View
     */
    public function showPage($url='home')
    {
        $left_image = $this->getLeftGutterImage();
        $review = $this->getReview();
        $content = $this->page->getPageByUrl($url);
        return view('page', compact('left_image', 'review','url', 'content'));
    }


    /**
     * Review page
     * @return \Illuminate\View\View
     */
    public function showReviews()
    {
        $left_image = $this->getLeftGutterImage();
        $review = $this->getReview();
        $reviews = $this->review->all();
        return view('reviews', compact('left_image', 'review','reviews'));
    }

    /**
     * Contact page
     * @return \Illuminate\View\View
     */
    public function showContact()
    {
        return $this->getView('contact');
    }

    public function processContact(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'email' => 'required|email',
            'comments' => 'required'
        ]);

        Event::fire(new ContactEvent($request));

        return $this->getView('contact_done');

    }

    private function getView($view_name)
    {
        $left_image = $this->getLeftGutterImage();
        $review = $this->getReview();
        return view($view_name, compact('left_image', 'review'));
    }

    private function getLeftGutterImage() {
        return '/images/left/'.rand(1,5). '.jpg';
    }

    private function getReview()
    {
        $all = $this->review->all();
        return $all[rand(1, count($all)-1)];
    }
}