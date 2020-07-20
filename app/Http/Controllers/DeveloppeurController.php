<?php

namespace App\Http\Controllers;
use App\Developpeur;
use app\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeveloppeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lesdev = Developpeur::All();
      return view("back.developpeur.index")->with("lesdev", $lesdev);
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
      $dev = Developpeur::find($id);
      return view("back.developpeur.show")->with("dev", $dev);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $dev = Developpeur::find($id);
      return view("back.developpeur.edit")->with("dev", $dev);
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
      $dev = Developpeur::find($id);
      $dev->competence = $request->input("competence");
      $rand = Str::random(10);
      $cv_upload = $request->file('cv');
      $photo_upload = $request->file('photo');
      if(($cv_upload != NULL) ){
        unlink(public_path($dev->cv));
        $cv_nommage = date('Y-m-d') . ' - ' . $rand .' - '. $cv_upload->getClientOriginalName();
        $cv_get = 'pdf\\' . $cv_nommage;
        if (($cv_upload->move('pdf', $cv_nommage))) {
          $dev->cv = $cv_get;
        }
      }
      if(($photo_upload != NULL)){
        unlink(public_path($dev->photo));
        $photo_nommage = date('Y-m-d') . ' - ' . $rand .' - '. $photo_upload->getClientOriginalName();
        $photo_get = 'img\\' . $photo_nommage;
        if (($photo_upload->move('img', $photo_nommage)) ) {
          $dev->photo = $photo_get;
        }
      }
      $dev->adresse = $request->input("adresse");
      $dev->ville = $request->input("ville");
      $dev->code_postal = $request->input("cp");
      $dev->telephone = $request->input("tel");
      $dev->date_naissance = $request->input("dn");
      $dev->save();
      return redirect()->route("developpeur.index")->with('success','Création réussite !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
