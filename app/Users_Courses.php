<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_Courses extends Model
{
    protected $fillable = ['user_id','course_id'];
    public function user() {
    return $this->belongsTo('App\User');}
    public function course() {
    return $this->belongsTo('App\course');}
}
