<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    //
    protected $fillable =['programme_code','programme_name','academic_level', 'active', 'hop_id'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
    public function hop()
    {
        return $this->belongsTo('App\User', 'hop_id');
    }
    public function course_details()
    {
        return $this->hasMany('App\CourseListingDetails');
    }
}
