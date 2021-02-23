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

class DiplomeController extends Controller
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
      return view("front.developpeur.create_diplome")->with("user",$user);
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
        $diplome = new Diplome;
        $diplome->intitule = $request->input('intitule');
        $diplome->mention = $request->input('mention');
        $diplome->date_obtention = $request->input('date');
        $diplome->developpeur_id = $user->developpeur_id;
        $diplome->save();

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
        $diplome = Diplome::Find($id);
        $diplome->delete();

        return redirect()->route("profil_show");
    }
}
