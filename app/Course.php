<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  public $timestamps = false;

  public function departments() {
    $this->belongsTo(Department::class, 'department', 'code');
  }
}
