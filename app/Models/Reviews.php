<?php
/**
 * @author Kevin Saunders
 */
namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * User reviews
 * Class Reviews
 * @package app\Models
 */
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
