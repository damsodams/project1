<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entreprise;
use App\Developpeur;
use Validator;
class UserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $lesUtilisateurs = User::All();
    return view("back.user.index")->with("lesUtilisateurs", $lesUtilisateurs);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $lesUtilisateurs = User::All();
    return view("back.user.create")->with("lesUtilisateurs", $lesUtilisateurs);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $user = new User;
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('mdp'));
    $user->statut = $request->input('statut');
    if($request->input('statut')=="entreprise"){
      $entreprise = new Entreprise;
      $entreprise->nom = $request->input("nome");
      $entreprise->logo = $request->input("logo");
      $entreprise->siret = $request->input("siret");
      $entreprise->adresse = $request->input("adresse");
      $entreprise->ville = $request->input("ville");
      $entreprise->code_postal = $request->input("cp");
      $entreprise->telephone = $request->input("tel");
      $entreprise->secteur_activité = $request->input("secteur_activite");
      $entreprise->nb_salarie = $request->input("nb_salarie");
      $entreprise->save();
      $user->entreprise_id = $entreprise->id;
    }elseif ($request->input('statut')=="dev") {
      $dev = new Developpeur;
      $dev->competence = $request->input("competence");
      $dev->cv = $request->input("cv");
      $dev->photo = $request->input("photo");
      $dev->adresse = $request->input("adressed");
      $dev->ville = $request->input("villed");
      $dev->code_postal = $request->input("cpd");
      $dev->telephone = $request->input("teld");
      $dev->date_naissance = $request->input("dn");
      $dev->save();
      $user->developpeur_id = $dev->id;
    }elseif ($request->input('statut')=="admin") {
      $admin = new Admin;
      $admin->nom =$request->input('noma');
      $admin->prenom =$request->input('prenom');
      $admin->save();
      $user->admin_id = $admin->id;
    }
    $user->save();

    return redirect()->route("utilisateur.index")->with('success','Création réussite !');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $utilisateur = User::find($id);
    return view('back.user.show')->with('utilisateur', $utilisateur);
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
    $user = User::find($id);
    if($user->statut == "dev"){
      Developpeur::find($user->developpeur_id)->delete();
    }elseif($user->statut == "admin"){
      Administrateur::find($user->administrateur_id)->delete();
    }elseif ($user->statut == "entreprise") {
      Entreprise::find($user->entreprise_id)->delete();
    }
    $user->delete();

    return redirect()->route("entreprise.index")->with('warning','Suppression réussite !');
  }
}
