<?php
/**
 * Created by PhpStorm.
 * @author Kevin Saunders
 * Date: 25/09/15
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

class EmailsReceived extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mysite_emails_received';

}