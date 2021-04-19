<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseListing extends Model
{
    //
    protected $fillable =['session_id', 'late', 'active', 'start_date', 'end_date', 'title'];

    public function session()
    {
        return $this->belongsTo('App\Session');
    }
    public function programmes()
    {
        return $this->belongsToMany('App\Programme');
    }
    public function course_details()
    {
        return $this->hasMany('App\CourseListingDetails');
    }
}
