<?php

namespace App\Http\Controllers;
use App\Postuler_Offre;
use App\Offre;
use App\developpeurs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $devid = auth::user()->developpeur_id;
        $OffresPostuler = Postuler_Offre::all()->where('developpeur_id',$devid);

        return view("front.developpeur.demande")->with("OffresPostuler",$OffresPostuler);
        // Afiichage
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
      $dev_id = auth::user()->developpeur_id;
      $lesoffresuser = Postuler_Offre::all()->where('developpeur_id',$dev_id);
      $test = false;
      foreach ($lesoffresuser as $offre) {
        if($id == $offre->offre_id){
          $test = true;
        }
      }

        $offre = Offre::Find($id);
        if($offre->vue ){
          $val = $offre->vue;
          $offre->vue = $val + 1 ;
        }else{
          $offre->vue = 1;
        }
        $offre->save();
        return view("front.show")->with("offre",$offre)
        ->with('test', $test);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $dev_id = auth::user()->developpeur_id;
      $lesoffresuser = Postuler_Offre::all()->where('developpeur_id',$dev_id);
      foreach ($lesoffresuser as $offre) {
        if($id == $offre->offre_id){
          return redirect()->route("offre_entreprise.index")->with('message', '/Existe deja');
        }
      }
        $postuler = new Postuler_Offre;
        $postuler->offre_id = $id;
        $postuler->developpeur_id = $dev_id;
        $postuler->statut = "1";
        $postuler->save();
        return redirect()->route("offre_entreprise.index");
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
        //
    }
}
