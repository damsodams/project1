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
  public function recherche(Request $request){
    if (auth()->guest()) {
        $lesOffres = Offre::where('titre', 'like', '%'.$request->input('search').'%')->orderBy('created_at' , 'DESC', 'updated_at' ,'DESC')->get();
        $countOffres = $lesOffres->count();
        return view ('front.index')->with('lesoffres', $lesOffres)
        ->with('countOffres', $countOffres);
    }
    $devid = auth::user()->developpeur_id;
    $lesOffres = Offre::where('titre', 'like', '%'.$request->input('search').'%')->orderBy('created_at' , 'DESC', 'updated_at' ,'DESC')->get();
    $countOffres = $lesOffres->count();
    $OffresPostuler = Postuler_offre::all()->where('developpeur_id',$devid);
    return view ('front.index')->with('lesoffres', $lesOffres)
    ->with('OffresPostuler', $OffresPostuler)
    ->with('countOffres', $countOffres);

  }
}
