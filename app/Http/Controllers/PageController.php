<?php
/**
 * @author Kevin Saunders
 * Date: 24/06/2015
 */

namespace App\Http\Controllers;


use App\Events\ContactEvent;
use App\Events\WorkshopEvent;
use App\Page;
use App\Workshop;
use Illuminate\Http\Request;
use App\Reviews;
use Illuminate\Support\Facades\Event;

class PageController extends Controller {

    /**
     * @var Page
     */
    private $page;

    /**
     * @var Reviews
     */
    private $review;

    /**
     * @var Workshop
     */
    private $workshop;

    function __construct(Page $page, Reviews $review, Workshop $workshop)
    {
        $this->page = $page;
        $this->review = $review;
        $this->workshop = $workshop;
    }


    /**
     * Home page
     * @param $url String
     * @return \Illuminate\View\View
     */
    public function showPage($url='home')
    {
        $content = $this->page->getPageByUrl($url);
        return $this->getView('page',['url'=>$url, 'content'=>$content]);
    }


    /**
     * Review page
     * @return \Illuminate\View\View
     */
    public function showReviews()
    {
        $reviews = $this->review->all();
        return $this->getView('page',['reviews'=>$reviews]);
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

    /**
     * Apply for lessons/workshops page
     * @param $workshop_id int
     * @return \Illuminate\View\View
     */
    public function showApply($workshop_id)
    {
        $include_right = false;
        $page_workshop = $this->workshop->findOrNew($workshop_id);
        $left_image = $this->getLeftGutterImage();
        //$this->getView('lessonform',['include_right'=>$include_right, 'page_workshop'=>$page_workshop]);
       return view('lessonform',['include_right'=>$include_right, 'page_workshop'=>$page_workshop,'left_image'=>$left_image] );
    }

    public function processApply(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required'
        ]);

        Event::fire(new WorkshopEvent($request));

        return $this->getView('lessondone');

    }

    private function getView($view_name, $extra_arguments=[])
    {
        $left_image = $this->getLeftGutterImage();
        $review = $this->getReview();
        if(!isset($extra_arguments['include_right'])){
            $extra_arguments['include_right'] = true;
        }
        $page_variables = array_merge(compact('left_image', 'review'), $extra_arguments);
        return view($view_name,$page_variables );
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