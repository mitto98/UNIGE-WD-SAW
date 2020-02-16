<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  public $timestamps = false;

  public function area() {
    return $this->belongsTo(Area::class);
  }

  public function comments() {
    $this->hasMany(Comment::class,'course');
  }
}
