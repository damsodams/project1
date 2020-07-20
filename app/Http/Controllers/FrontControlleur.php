<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontControlleur extends Controller
{
  public function index(){
    return view ('front.index');
  }
}
