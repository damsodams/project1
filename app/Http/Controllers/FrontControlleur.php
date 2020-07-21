<?php

namespace App\Http\Controllers;
use App\Offre;
use Illuminate\Http\Request;

class FrontControlleur extends Controller
{
  public function index(){

    $lesoffres = Offre::orderBy('date_inline' , 'DESC')->get();

    return view ('front.index')->with('lesoffres', $lesoffres);
  }
}
