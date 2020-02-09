<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index() {
      return response()->json(Area::all());
    }

    public function get(Area $area) {
      $area->departments;
      return response()->json($area);
    }
}
