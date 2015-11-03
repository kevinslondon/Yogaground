<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mysite_workshop';

    /**
     * Get the students for the workshop
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students(){
        return $this->belongsToMany('App\Student','mysite_class_attedance','wid','uid');
    }

    /**
     * All workshops
     * @return mixed
     */
    public function getAllWorkshops()
    {
        return $this->orderBy('workshop_date','DESC')
            ->get();
    }

    /**
     * Gets the workshop date formatted as Thursday 29th Oct 2015 at 19:30
     * @return string
     */
    public function getWorkshopDate()
    {
        return date('l jS M Y \a\t H:i',strtotime($this->workshop_date));
    }

    /**
     * Checks to see if the workshop has reached it's limit
     * @return bool
     */
    public function isFull()
    {
        return count($this->students) >= $this->workshop_limit;
    }
}
