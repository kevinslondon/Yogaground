<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'yogablog_newsletter';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function workshops()
    {
        return $this->belongsToMany('App\Workshop','mysite_class_attedance','uid','wid');
    }

    public function getByEmail($email)
    {
        return $this
            ->where('email', $email)
            ->get();
    }
}
