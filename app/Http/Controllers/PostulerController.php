<?php

namespace App\Http\Controllers;
use App\Postuler_offre;
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
        $LOPostuler = Postuler_offre::all()->where('developpeur_id',$devid);

        return view("front.developpeur.demande")->with("LOPostuler",$LOPostuler);
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
        $postuler = Postuler_offre::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $postuler = new Postuler_offre;
      $postuler->offre_id = $id;
      $postuler->developpeur_id = auth::user()->developpeur_id;
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
