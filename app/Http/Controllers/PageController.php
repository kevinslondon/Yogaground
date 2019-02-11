<?php
/**
 * @author Kevin Saunders
 * Date: 24/06/2015
 */

namespace App\Http\Controllers;


use App\Events\NewsletterEvent;
use App\Models\Blog;
use App\Events\ContactEvent;
use App\Models\Page;
use App\Models\Workshop;
use Illuminate\Http\Request;
use App\Models\Reviews;
use Illuminate\Support\Facades\Event;
use JohannEbert\LaravelSpamProtector\SpamProtector;

class PageController extends Controller
{

    /**
     * View trait has some convenience functions for the view
     */
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
     * @var Workshop
     */
    private $workshop;



    /**
     * PageController constructor.
     * @param Page $page
     * @param Reviews $review
     * @param Blog $blog
     * @param Workshop $workshop
     */
    public function __construct(Page $page, Reviews $review, Blog $blog, Workshop $workshop)
    {
        $this->page = $page;
        $this->review = $review;
        $this->blog = $blog;
        $this->workshop = $workshop;
    }


    /**
     * Home page
     * @param $url String
     * @return \Illuminate\View\View
     */
    public function showPage($url = 'home')
    {
        $content = $this->page->getPageByUrl($url);
        $this->title = $content->header;
        return $this->getView('page', ['url' => $url, 'content' => $content]);
    }


    /**
     * Review page
     * @return \Illuminate\View\View
     */
    public function showReviews()
    {
        $reviews = $this->review->all();
        $this->title = 'Yogaground Reviews and Testimonials';
        return $this->getView('reviews', ['reviews' => $reviews]);
    }
    
    
    public function showNewsletter()
    {
        $this->title = 'Yogaground Newsletter, Tips, Tutorials Signup';
        return $this->getView('newsletter',['hide_side_bar_mailchimp' => true]);
    }

    /**
     * Process the contact request
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function processNewsletter(Request $request)
    {
        $this->validate($request, [
            'EMAIL' => 'required|email',
        ]);

        $email = $request->get('EMAIL');
        Event::fire(new NewsletterEvent($request));

        //exit();
        return $this->getView('newsletter_done',['email' => $email]);
    }

    /**
     * Contact page
     * @return \Illuminate\View\View
     */
    public function showContact()
    {
        $this->title = 'Yogaground Contact';
        return $this->getView('contact');
    }



    /**
     * Process the contact request
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function processContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'comments' => 'required',
            'captcha' => 'required|captcha'
        ],
            [
                'captcha.required' => env('CAPTCHA_MESSAGE'),
                'captcha.captcha' => env('CAPTCHA_FAIL')
            ]);

        $spamProtector = new SpamProtector();
        $email = $request->get('email');

        //Only process this if the email address isn't spammy
        try {
            if (!$spamProtector->isSpamEmail($email)) {
                Event::fire(new ContactEvent($request));
            }
        } catch (\Exception $e) {
            return $this->getView('contact_done');
        }

        $this->title = 'Yogaground Contact form complete';
        return $this->getView('contact_done');
    }


}