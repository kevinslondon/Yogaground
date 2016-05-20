<?php
/**
 * @author Kevin Saunders
 * Admin workshops controller
 */

namespace app\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;

class Workshops extends Controller
{

    /**
     * @var Workshop
     */
    private $workshop;

    /**
     * Workshops constructor.
     * @param Workshop $workshop
     */
    public function __construct(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }

    /**
     * Gets the list of workshops
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getWorkshops()
    {
        $workshops = $this->workshop->getAllWorkshops();
        return view('auth.workshops', compact('workshops'));
    }


}