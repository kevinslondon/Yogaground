<?php
/**
 * @author Kevin Saunders
 */
namespace app\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Workshops
 * Class Workshop
 * @package app\Models
 */
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
    public function students()
    {
        return $this->belongsToMany('app\Models\Student', 'mysite_class_attedance', 'wid', 'uid');
    }

    /**
     * All workshops
     * @return mixed
     */
    public function getAllWorkshops()
    {
        return $this->orderBy('workshop_date', 'DESC')
            ->get();
    }

    /**
     * All workshops
     * @return mixed
     */
    public function getCurrentWorkshops()
    {
        return $this->where('workshop_type', 'workshop')
            ->where('workshop_date', '>', Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()))
            ->orderBy('workshop_date', 'DESC')
            ->get();
    }

    /**
     * Gets the workshop date formatted as Thursday 29th Oct 2015 at 19:30
     * @return string
     */
    public function getWorkshopDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->workshop_date)
            ->format('l jS M Y \a\t H:i');
    }

    /**
     * @return float gets the price based on the offer or full fee
     */
    public function getFee()
    {
        if($this->offerfee <= 0 || !$this->offer_expire){
            return $this->fullfee;
        }

        return $this->isOfferPassed() ? $this->fullfee : $this->offerfee ;
    }

    /**
     * Gets the pay pal button based on the offer or full fee
     * @return string
     */
    public function getPayPalButton()
    {
        if($this->offerfee <= 0 || !$this->offer_expire){
            return $this->paypal_fullfee;
        }

        return $this->isOfferPassed() ? $this->paypal_fullfee : $this->paypal_offer;
    }

    public function getOfferExpireDate()
    {
        if(!$this->offer_expire){
            return '';
        }
        return Carbon::createFromFormat('Y-m-d', $this->offer_expire)
            ->format('l jS M Y');
    }

    /**
     * Checks to see if the workshop has reached it's limit
     * @return bool
     */
    public function isFull()
    {
        return count($this->students) >= $this->workshop_limit;
    }

    public function isWorkshop()
    {
        return $this->workshop_type == 'workshop';
    }

    public function isOfferPassed()
    {
        if(!$this->offer_expire){
            return true;
        }
        return Carbon::createFromFormat('Y-m-d', $this->offer_expire)->isPast();
    }

    /**
     * Check to see if the workshop is in the past
     * @return bool
     */
    public function isPassedDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->workshop_date)->isPast();
    }
}
