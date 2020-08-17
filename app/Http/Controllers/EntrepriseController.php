<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Entreprise;
use Validator;
use Illuminate\Support\Str;
class EntrepriseController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $lesEntreprises = Entreprise::All();
    return view("back.entreprise.index")->with("lesEntreprises", $lesEntreprises);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $entreprise = Entreprise::find($id);
    return view('back.entreprise.show')->with('entreprise', $entreprise);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $entreprise = Entreprise::find($id);
    return view('back.entreprise.edit')->with('entreprise', $entreprise);
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
    $entreprise = Entreprise::find($id);
    $user = $entreprise->user;
    $entreprise->nom = $request->input("nome");
    $rand = Str::random(10);
    $img_upload = $request->file('logo');
    if($img_upload != NULL){
    //  unlink(public_path($entreprise->logo));
      $img_nommage = date('Y-m-d') . ' - ' . $rand .' - '. $img_upload->getClientOriginalName();
      $img_get = 'img\\' . $img_nommage;
      if ($img_upload) {
        if ($img_upload->move('img', $img_nommage)) {
          $entreprise->logo = $img_get;
          $user->image_profil = $img_get;
          $user->save();
        }
      }
    }
    $entreprise->siret = $request->input("siret");
    $entreprise->adresse = $request->input("adresse");
    $entreprise->ville = $request->input("ville");
    $entreprise->code_postal = $request->input("cp");
    $entreprise->telephone = $request->input("tel");
    $entreprise->secteur_activité = $request->input("secteur_activite");
    $entreprise->nb_salarie = $request->input("nb_salarie");
    $entreprise->save();

    return redirect()->route("entreprise.index")->with('success','Création réussite !');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
