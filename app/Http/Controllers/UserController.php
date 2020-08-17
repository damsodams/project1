<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Entreprise;
use App\Developpeur;
use App\Administrateur;
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
      //$entreprise->logo = $request->input("logo");
      //Pour le PDF
      $rand = Str::random(10);
      $img_upload = $request->file('logo');
      if($img_upload != NULL){
        $img_nommage = date('Y-m-d') . ' - ' . $rand .' - '. $img_upload->getClientOriginalName();
        $img_get = 'img\\' . $img_nommage;
        if ($img_upload) {
          if ($img_upload->move('img', $img_nommage)) {
            $entreprise->logo = $img_get;
            $user->image_profil = $img_get;
          }
        } else {
          return redirect()->route('offres.index')->withStatus(__('Problème lors de l\'upload du PDF, veuillez essayer à nouveau.'));
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
      $user->entreprise_id = $entreprise->id;
    }elseif ($request->input('statut')=="dev") {
      $dev = new Developpeur;
      $dev->competence = $request->input("competence");
      //$dev->cv = $request->input("cv");
      //$dev->photo = $request->input("photo");
      $rand = Str::random(10);
      $cv_upload = $request->file('cv');
      $photo_upload = $request->file('photo');
      if(($cv_upload != NULL) && ($photo_upload != NULL)){
        $cv_nommage = date('Y-m-d') . ' - ' . $rand .' - '. $cv_upload->getClientOriginalName();
        $photo_nommage = date('Y-m-d') . ' - ' . $rand .' - '. $photo_upload->getClientOriginalName();
        $cv_get = 'pdf\\' . $cv_nommage;
        $photo_get = 'img\\' . $photo_nommage;
        if (($cv_upload->move('pdf', $cv_nommage)) && ($photo_upload->move('img', $photo_nommage)) ) {
          $dev->cv = $cv_get;
          $dev->photo = $photo_get;
          $user->image_profil = $photo_get;
        }
      } else {
        return redirect()->route('offres.index')->withStatus(__('Problème lors de l\'upload du PDF, veuillez essayer à nouveau.'));
      }

      $dev->adresse = $request->input("adressed");
      $dev->ville = $request->input("villed");
      $dev->code_postal = $request->input("cpd");
      $dev->telephone = $request->input("teld");
      $dev->date_naissance = $request->input("dn");
      $dev->save();
      $user->developpeur_id = $dev->id;
    }elseif ($request->input('statut')=="admin") {
      $admin = new Administrateur;
      $admin->nom =$request->input('noma');
      $admin->prenom =$request->input('prenom');
      $admin->save();
      $user->administrateur_id = $admin->id;
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
    $utilisateur = User::find($id);
    return view('back.user.edit')->with('utilisateur', $utilisateur);
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
    $user = User::find($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('mdp'));

    $user->save();

    return redirect()->route("utilisateur.index")->with('success','Création réussite !');
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
      unlink(public_path($user->developpeur->cv));
      unlink(public_path($user->developpeur->photo));
      Developpeur::find($user->developpeur_id)->delete();
    }elseif($user->statut == "admin"){
      Administrateur::find($user->administrateur_id)->delete();
    }elseif ($user->statut == "entreprise") {
      unlink(public_path($user->entreprise->logo));
      Entreprise::find($user->entreprise_id)->delete();

    }
    $user->delete();

    return redirect()->route("utilisateur.index")->with('warning','Suppression réussite !');
  }
}
