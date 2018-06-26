<?php
/**
 * Date: 26/06/2018
 * Time: 16:23
 */

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshopList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mysite_workshop_item';


    /**
     * All workshops
     * @return mixed
     */
    public function getWorkshops()
    {
        return $this->where('workshop_type', 'workshop')
            ->get();
    }


}