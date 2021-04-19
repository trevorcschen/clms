<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseListingDetails extends Model
{
    //
    protected $fillable =['course_listing_id', 'programme_id', 'remark', 'amendment_reason', 'lecturer',
        'similar_sub', 'lec_hrs', 'tut_hrs', 'pract_hrs', 'on_hrs', 'number_students', 'semester', 'intake'];


    public function programme()
    {
        return $this->belongsTo('App\Programme');
    }

    public function course_listing()
    {
        return $this->belongsTo('App\CourseListing');
    }
}
