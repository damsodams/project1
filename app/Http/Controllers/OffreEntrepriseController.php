<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Offre;
use App\Entreprise;
use Illuminate\Support\Str;
class OffreEntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $entrepriseUser = auth::user()->entreprise_id;
      $lesOffres = Offre::All()->where('entreprise_id',$entrepriseUser);
      $entrepriseName = auth::user()->entreprise->nom;
      return view("front.entreprise.offre.index")->with("lesOffres",$lesOffres)
                                                ->with("entrepriseName",$entrepriseName);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $entrepriseUser = auth::user()->entreprise_id;
      return view("front.entreprise.offre.create")->with("entrepriseUser", $entrepriseUser);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrepriseid= auth::user()->entreprise_id;
        $offre = new Offre;
        $offre->titre = $request->input('titre');
        $offre->description = $request->input('description');
        $pdf_upload = $request->file('pdf');
        $rand = Str::random(10);
        if(($pdf_upload != NULL) ){
          $pdf_nommage = date('Y-m-d') . ' - ' . $rand .' - '. $pdf_upload->getClientOriginalName();
          $pdf_get = 'pdf\\' . $pdf_nommage;
          if (($pdf_upload->move('pdf', $pdf_nommage))) {
            $offre->pdf = $pdf_get;
          }
        }
        $offre->contrainte = $request->input('contrainte');
        $offre->type_offre = $request->input('type_offre');
        $offre->date_inline = date("Y-m-d");
        $offre->entreprise_id = $entrepriseid;
        $offre->save();
        return redirect()->route("offre_entreprise.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrepriseUser = auth::user()->entreprise_id;
        $offre = Offre::find($id);
        if($offre->entreprise_id != $entrepriseUser){
          return redirect()->route("offre_entreprise.index");
        }
        return view("front.entreprise.offre.show")->with("offre",$offre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $entrepriseUser = auth::user()->entreprise_id;
      $offre = Offre::find($id);
      if($offre->entreprise_id != $entrepriseUser){
        return redirect()->route("offre_entreprise.index");
      }
      return view("front.entreprise.offre.edit")->with("offre",$offre);
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
      $entrepriseUser = auth::user()->entreprise_id;
      $offre = Offre::find($id);
      if($offre->entreprise_id != $entrepriseUser){
        return redirect()->route("offre_entreprise.index");
      }
      $offre->titre = $request->input('titre');
      $offre->description = $request->input('description');
      $pdf_upload = $request->file('pdf');
      $rand = Str::random(10);
      if(($pdf_upload != NULL) ){
        unlink(public_path($offre->pdf));
        $pdf_nommage = date('Y-m-d') . ' - ' . $rand .' - '. $pdf_upload->getClientOriginalName();
        $pdf_get = 'pdf\\' . $pdf_nommage;
        if (($pdf_upload->move('pdf', $pdf_nommage))) {
          $offre->pdf = $pdf_get;
        }
      }
      $offre->contrainte = $request->input('contrainte');
      $offre->type_offre = $request->input('type_offre');
      $offre->save();
      return redirect()->route("offre_entreprise.index")->with('success','Création réussite !');
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
