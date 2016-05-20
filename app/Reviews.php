<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mysite_testimonials';

    public function getDate()
    {
        return date('M Y', strtotime($this->testimonial_date));
    }
}
