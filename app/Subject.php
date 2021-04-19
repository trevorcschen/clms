<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable =['code','title',
        'lec_hrs', 'tut_hrs', 'pract_hrs', 'on_hrs', 'cred_hrs', 'active', 'pre-requisite'];

    public function programmes()
    {
        return $this->belongsToMany('App\Programme');
    }
}
