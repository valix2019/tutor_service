<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['Name','Duration','Cost','Location'];

    public function user() {
        return $this->belongsToMany('App\User','users__courses','course_id','user_id');
    }

    public function students(){
        return $this->user()->where('role','student');
    }

    public function teachers(){
        return $this->user()->where('role','teacher');
    }
}
