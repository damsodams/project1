<?php

namespace App\Http\Controllers;
use App\Postuler_offre;
use App\Offre;
use App\Entreprise;
use App\developpeurs;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EntrepriseFrontController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function mail_index()
  {
    $messages = Message::Where('destinatair_id', auth::user()->id)->get();
    return view ('front.entreprise.contact')->with('messages',$messages);
  }

}
