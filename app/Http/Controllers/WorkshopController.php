<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 14/07/2015
 * Time: 16:47
 */

namespace app\Http\Controllers;

use Illuminate\Support\Facades\Event;
use App\Events\WorkshopEvent;
use App\Reviews;
use App\Workshop;
use App\Student;
use App\Blog;
use Illuminate\Http\Request;


class WorkshopController  extends Controller
{

    //use ViewTrait;
    /**
     * @var Workshop
     */
    private $workshop;

    /**
     * @var Student
     */
    private $student;

    /**
     * @var Reviews
     */
    protected $review;

    /**
     * @var Blog
     */
    protected $blog;

    /**
     * WorkshopController constructor.
     * @param Workshop $workshop
     * @param Student $student
     * @param Reviews $review
     * @param Blog $blog
     */
    public function __construct(Workshop $workshop, Student $student, Reviews $review, Blog $blog)
    {
        $this->workshop = $workshop;
        $this->student = $student;
        $this->review = $review;
        $this->blog = $blog;
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

        if($this->student->isRegistered($request->get('name'),$request->get('email'),$workshop_id)){
            $student_class = $this->student->getByEmail($request->get('email'));
            $student = isset($student_class->name) ? $student_class->name : '';
            return $this->getView('lessonregistered',compact('page_workshop','student'));
        }

        Event::fire(new WorkshopEvent($request,$page_workshop ));
        $student_class = $this->student->getByEmail($request->get('email'));
        $student = isset($student_class->name) ? $student_class->name : '';

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

    public function getWorkshops()
    {
        $workshops = $this->workshop->all();
        //print_r($workshops);
        return view('auth.workshops',['workshops'=>$workshops]);
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