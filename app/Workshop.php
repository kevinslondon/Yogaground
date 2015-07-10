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

    public function getWorkshopDate()
    {
        return date('l jS M Y \a\t H:i',strtotime($this->workshop_date));
    }
}
