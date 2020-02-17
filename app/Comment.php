<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $with = array('name');

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function course() {
        return $this->belongsTo(Course::class);
    }
}
