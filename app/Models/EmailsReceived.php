<?php
/**
 * @author Kevin Saunders
 * Date: 25/09/15
 */

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Emails received via the site save to database
 * Class EmailsReceived
 * @package app\Models
 */
class EmailsReceived extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mysite_emails_received';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone','comments'];

    public $timestamps  = false;

}