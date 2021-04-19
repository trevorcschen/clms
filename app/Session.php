<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{

    protected $fillable = ['title','start_date', 'end_date', 'active'];
    //
    public function courseListings()
    {
        return $this->hasMany('App\CourseListing');
    }
}
