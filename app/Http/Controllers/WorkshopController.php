<?php
/**
 * @author Kevin Saunders
 * Workshop controller for applying and handling workshops
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Event;
use App\Events\WorkshopEvent;
use App\Models\Reviews;
use App\Models\Workshop;
use App\Models\Student;
use App\Models\Blog;
use Illuminate\Http\Request;


class WorkshopController extends Controller
{

    /**
     * View trait has some convenience functions for the view
     */
    use ViewTrait;
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
        if ($page_workshop->isFull()) {
            return $this->getView('lessonfull', ['page_workshop' => $page_workshop]);
        }

        //Check if the workshop is still current
        if ($page_workshop->isPassedDate()) {
            return $this->getView('lessonexpired', ['page_workshop' => $page_workshop]);
        }

        $left_image = $this->getLeftGutterImage();
        $blog_menu = $this->blog->getBlogMenu();
        $this->title = 'Yogaground Apply for '.$page_workshop->name;
        return $this->getView('lessonform', ['include_right' => $include_right, 'page_workshop' => $page_workshop, 'left_image' => $left_image, 'blog_menu' => $blog_menu]);
    }

    /**
     *  Process the workshop application
     * @param $workshop_id int
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function processApply($workshop_id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required'
        ]);

        $page_workshop = Workshop::findOrNew($workshop_id);

        if ($this->student->isRegistered($request->get('name'), $request->get('email'), $workshop_id)) {
            $student_class = $this->student->getByEmail($request->get('email'));
            $student = isset($student_class->name) ? $student_class->name : '';
            return $this->getView('lessonregistered', compact('page_workshop', 'student'));
        }

        Event::fire(new WorkshopEvent($request, $page_workshop));
        $student_class = $this->student->getByEmail($request->get('email'));
        $student = isset($student_class->name) ? $student_class->name : '';

        $this->title = 'Yogaground Apply complete';
        return $this->getView('lessondone', compact('page_workshop', 'student'));

    }

    /**
     * Show the payment page after lesson application
     * @param $workshop_id int
     * @return \Illuminate\View\View
     */
    public function showPay($workshop_id)
    {
        $include_right = false;
        $page_workshop = $this->workshop->findOrNew($workshop_id);
        $this->title = 'Yogaground Payment Page';
        return $this->getView('lessonpay', compact('page_workshop', 'include_right'));
    }



}