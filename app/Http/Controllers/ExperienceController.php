<?php

namespace App\Http\Controllers;

use App\Postuler_Offre;
use App\Offre;
use App\developpeurs;
use App\message;
use App\User;
use App\Diplome;
use App\Experience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $user = auth::user();
    return view("front.developpeur.create_experience")->with("user",$user);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $user = auth::user();
    $experience = new Experience;
    $experience->annee_debut = $request->input('datedebut');
    $experience->annee_fin = $request->input('datefin');
    $experience->entreprise = $request->input('nom');
    $experience->ville = $request->input('ville');
    $experience->poste = $request->input('poste');
    $experience->developpeur_id = $user->developpeur_id;
    $experience->save();

    return redirect()->route("profil_show");
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $experience = Experience::find($id);
    $experience->delete();

    return redirect()->route("profil_show");
  }
}
