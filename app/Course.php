<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $primaryKey = 'code';
  public $timestamps = false;

  public function departments() {
    $this->belongsTo(Department::class, 'department', 'code');
  }
}
