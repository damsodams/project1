<?php

namespace App\Http\Controllers;
use App\Offre;
use App\Postuler_offre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FrontControlleur extends Controller
{
  public function index(){
    if (auth()->guest()) {
        $lesoffres = Offre::orderBy('date_inline' , 'DESC')->get();
        return view ('front.index')->with('lesoffres', $lesoffres);
    }
    $devid = auth::user()->developpeur_id;
    $lesoffres = Offre::orderBy('date_inline' , 'DESC')->get();
    $OffresPostuler = Postuler_offre::all()->where('developpeur_id',$devid);
    return view ('front.index')->with('lesoffres', $lesoffres)
    ->with('OffresPostuler', $OffresPostuler);

  }
}
