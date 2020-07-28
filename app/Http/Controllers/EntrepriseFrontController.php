<?php

namespace App\Http\Controllers;
use App\Postuler_offre;
use App\Offre;
use App\Entreprise;
use App\developpeurs;
use App\Message;
use App\diplome;
use App\sms;
use App\user;
use App\conversation;
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
    return view ('front.entreprise.mail.index')->with('messages',$messages);
  }
  public function mail_show($id)
  {
    $message = Message::find($id);
    //Indique que le message est vue ;
    $message->is_open = true;
    $message->save();
    //Indique a l'utilisateur que la demande a ete lue :
    $post = Postuler_offre::find($message->post->id);
    if($post->type_contrat == "1" ){
      $post->type_contrat = "2";
    }
    $post->save();

    return view ('front.entreprise.mail.show')->with('message',$message);
  }
  public function candidature_accepter($id){
    $post = Postuler_offre::find($id);
    $post->type_contrat = "3";
    $post->is_validate = true;
    $post->save();
  }
  public function candidature_refuser($id){

    $post = Postuler_offre::find($id);
    $post->type_contrat = "4";
    $post->is_validate = true;
    $post->save();
  }
  public function mail_destroy($id){
    $value = explode(',',$id);
    foreach ($value as $val) {
      $message = Message::find($val);
      if($message->post->type_contrat != "3"){
        $post = postuler_offre::find($message->post->id);
        $post->type_contrat = '4';
        $post->save();
      }
      $message->delete();
    }
    return redirect()->route("mail_index");
  }
  public function projet_index(){
      $entrepriseUser = auth::user()->entreprise_id;
      $lesOffres = Offre::All()->where('entreprise_id',$entrepriseUser);
      $entrepriseName = auth::user()->entreprise->nom;
      return view("front.entreprise.projet.index")->with("lesOffres",$lesOffres)
                                                ->with("entrepriseName",$entrepriseName);

  }
  public function conversation_index(){
/*
    $conversation = new conversation;
        $conversation->title = 'God of War';
        $conversation->save();

        $conversation->users()->attach($user);*/
$user = auth::user();
      
        return view("front.entreprise.conversation.index")->with("user",$user);


  }



}
