<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $primaryKey = 'code';
  public $incrementing = false;
  protected $keyType = 'string';
  public $timestamps = false;

  protected $with = array('courses');

  public function area() {
    return $this->belongsTo(Area::class, 'area');
  }

  public function courses() {
    return $this->hasMany(Course::class, 'department');
  }
}
