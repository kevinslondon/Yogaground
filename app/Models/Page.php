<?php
/**
 * @author Kevin Saunders
 * Date: 30/06/2015
 */

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Pages
 * Class Page
 * @package app\Models
 */
class Page extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'content_pages';

    /**
     * @param $url String
     */
    public function getPageByUrl($url)
    {
        return $this->where('url', $url)
            ->first();
    }

}