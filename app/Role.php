<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable =[
        'name','active'
    ];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
