<?php
/**
 * @author Kevin Saunders
 * Date: 24/06/2015
 */

namespace App\Http\Controllers;


use App\Blog;
use App\Events\ContactEvent;
use App\Page;
use Illuminate\Http\Request;
use App\Reviews;
use Illuminate\Support\Facades\Event;

class PageController extends Controller {

    use ViewTrait;
    /**
     * @var Page
     */
    private $page;

    /**
     * @var Reviews
     */
    protected $review;

    /**
     * @var Blog
     */
    private $blog;


    /**
     * PageController constructor.
     * @param Page $page
     * @param Reviews $review
     * @param Blog $blog
     */
    public function __construct(Page $page, Reviews $review, Blog $blog)
    {
        $this->page = $page;
        $this->review = $review;
        $this->blog = $blog;
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
    
    
    public function showNewsletter()
    {
        return $this->getView('newsletter',['hide_side_bar_mailchimp' => true]);
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




}