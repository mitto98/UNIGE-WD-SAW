<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $with = array('courses');
  public $timestamps = false;

  public function courses() {
    return $this->hasMany(Course::class);
  }
}
