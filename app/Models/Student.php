<?php
/**
 * @author Kevin Saunders
 */
namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Students for the site
 * Class Student
 * @package app\Models
 */
class Student extends Model
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function workshops()
    {
        return $this->belongsToMany('App\Workshop', 'mysite_class_attedance', 'uid', 'wid');
    }

    /**
     * Checks if the student exists
     * @param $name
     * @param $email
     * @return bool
     */
    public static function isStudent($name, $email)
    {
        return self::where('email', $email)
            ->where('name', $name)
            ->count() > 0;
    }


    /**
     * Gets the student by email
     * @param $email
     * @return mixed
     */
    public function getByEmail($email)
    {
        return $this
            ->where('email', $email)
            ->get()
            ->first();
    }

    /**
     * Gets the student by email and name
     * @param $name
     * @param $email
     */
    public function getByEmailAndName($name, $email)
    {
        return $this
            ->where('email', $email)
            ->where('name', $name)
            ->get()
            ->first();
    }

    /**
     * Checks to see if a student is registered
     * @param $name
     * @param $email
     * @param $workshop_id
     * @return bool
     */
    public function isRegistered($name, $email, $workshop_id)
    {
        $student = $this->getByEmailAndName($name, $email);
        if (!$student || !$student->id) {
            return false;
        }
        if (!$student->workshops) {
            return false;
        }

        foreach ($student->workshops as $workshop) {
            if ($workshop->id == $workshop_id) {
                return true;
            }
        }
        return false;
    }
}
