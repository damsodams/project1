<?php

namespace App\Http\Controllers;
use App\Offre;
use App\Entreprise;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lesoffres = Offre::orderBy('date_inline' , 'DESC')->get();
      return view ('back.offre.index')->with('lesoffres', $lesoffres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $lesentreprise = Entreprise::all();
      return view ('back.offre.create')->with('lesentreprise', $lesentreprise);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $offre->date_inline = date("Y-m-d");
        $offre->contrainte = $request->input('contrainte');
        $offre->type_offre = $request->input('type_offre');
        $offre->entreprise_id = $request->input('entreprise_id');
        $offre->save();

        return redirect()->route("offre.index")->with('success','Création réussite !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $offre = Offre::find($id);
      return view('back.offre.show')->with('offre', $offre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $offre = Offre::find($id);
      return view('back.offre.edit')->with('offre', $offre);
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
      $offre = Offre::find($id);
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
      return redirect()->route("offre.index")->with('success','Création réussite !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $offre = Offre::find($id);
      unlink(public_path($offre->pdf));
      $offre->delete();

      return redirect()->route("offre.index")->with('warning','Suppression réussite !');
    }
}
