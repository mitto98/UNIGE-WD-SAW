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
    return $this->hasMany(Comment::class);
  }
}
