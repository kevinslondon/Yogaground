<?php
/**
 * @author Kevin Saunders
 * Date: 24/06/2015
 */

namespace App\Http\Controllers;


use App\Blog;
use App\Events\ContactEvent;
use App\Events\WorkshopEvent;
use App\Page;
use App\Student;
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

    /**
     * @var Blog
     */
    private $blog;

    /**
     * @var Student
     */
    private $student;

    /**
     * PageController constructor.
     * @param Page $page
     * @param Reviews $review
     * @param Workshop $workshop
     * @param Blog $blog
     * @param Student $student
     */
    public function __construct(Page $page, Reviews $review, Workshop $workshop, Blog $blog, Student $student)
    {
        $this->page = $page;
        $this->review = $review;
        $this->workshop = $workshop;
        $this->blog = $blog;
        $this->student = $student;
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
        return $this->getView('reviews',['reviews'=>$reviews]);
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
        //Check if the workshop is already full
        if($page_workshop->isFull()){
            return $this->getView('lessonfull',['page_workshop'=>$page_workshop]);
        }

        //Check if the workshop is still current
        if(date('U') > strtotime($page_workshop->workshop_date)){
            return $this->getView('lessonexpired',['page_workshop'=>$page_workshop]);
        }

        $left_image = $this->getLeftGutterImage();
        $blog_menu = $this->blog->getBlogMenu();
       return view('lessonform',['include_right'=>$include_right, 'page_workshop'=>$page_workshop,'left_image'=>$left_image,'blog_menu'=>$blog_menu] );
    }

    /**
     * @param $workshop_id int
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function processApply($workshop_id,Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required'
        ]);

        $page_workshop = Workshop::findOrNew($workshop_id);
        $student = $this->student->getByEmail($request->get('email'));

        if($this->student->isRegistered($request->get('name'),$request->get('email'),$workshop_id)){
            return $this->getView('lessonregistered',compact('page_workshop','student'));
        }

        Event::fire(new WorkshopEvent($request,$page_workshop ));
        $student = $this->student->getByEmail($request->get('email'));

        return $this->getView('lessondone',compact('page_workshop','student'));

    }

    /**
     * Apply for lessons/workshops page
     * @param $workshop_id int
     * @return \Illuminate\View\View
     */
    public function showPay($workshop_id)
    {
        $include_right = false;
        $page_workshop = $this->workshop->findOrNew($workshop_id);
        return $this->getView('lessonpay',compact('page_workshop','include_right'));
    }

    private function getView($view_name, $extra_arguments=[])
    {
        $left_image = $this->getLeftGutterImage();
        $review = $this->getReview();
        $blog_menu = $this->blog->getBlogMenu();
        if(!isset($extra_arguments['include_right'])){
            $extra_arguments['include_right'] = true;
        }
        $page_variables = array_merge(compact('left_image', 'review','blog_menu'), $extra_arguments);
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