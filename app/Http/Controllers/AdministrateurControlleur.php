<?php

namespace App\Http\Controllers;
use App\Administrateur;
use Illuminate\Http\Request;

class AdministrateurControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lesAdmin = Administrateur::All();
      return view("back.Administrateur.index")->with("lesAdmin", $lesAdmin);
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
      $admin = Administrateur::find($id);
      return view("back.Administrateur.show")->with("admin", $admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $admin = Administrateur::find($id);
      return view("back.Administrateur.edit")->with("admin", $admin);
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
      $admin= Administrateur::find($id);
      $admin->nom = $request->input("nom");
      $admin->prenom = $request->input("prenom");
      $admin->save();
      return redirect()->route("administrateur.index")->with('success','Création réussite !');
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
