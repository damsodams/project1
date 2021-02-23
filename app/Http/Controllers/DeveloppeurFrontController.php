<?php

namespace App\Http\Controllers;
use App\Postuler_Offre;
use App\Offre;
use App\developpeurs;
use App\message;
use App\User;
use App\Diplome;
use App\Experience;
use App\Conversation;
use App\Conversation_user;
use App\msg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DeveloppeurFrontController extends Controller
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
  public function postuler($id)
  {
    $dev_id = auth::user()->developpeur_id;
    $lesoffresuser = Postuler_Offre::all()->where('developpeur_id',$dev_id);
    foreach ($lesoffresuser as $offre) {
      if($id == $offre->offre_id){
        return redirect()->route("offre_entreprise.index");
      }
    }
    $offre = Offre::Find($id);
    $emetteur_id = auth::user()->id;
    $destinataire = User::where('entreprise_id',  $offre->entreprise->id)->get();
    $destinataire_id = $destinataire[0]->id;

    //Ajout Objet postuler
    $postuler = new Postuler_Offre;
    $postuler->offre_id = $id;
    $postuler->developpeur_id = $dev_id;
    $postuler->statut = "1";
    $postuler->save();

    //Creation du Message
    $message = new Message;
    $message->emetteur_id = $emetteur_id;
    $message->destinatair_id = $destinataire_id;
    $message->objet = "Nouveau Candidat a votre offre '" . $offre->titre . "'";
    $message->body = "gnagnagnagna" ;
    $message->pj = "gnol";
    $message->is_post = true;
    $message->post_id = $postuler->id;
    $message->save();

    //creation de la conversation et envoie message
    $convs = Conversation::all();
    $conv_ec;
    $test = 0;
      //Test si une conversation existe deja
    foreach ($convs as $conv ) {
      $test = 0;
      for ($i=0; $i < 2; $i++) {
        if(($conv->users[$i]->id == auth::user()->id)||($conv->users[$i]->id == $destinataire_id)){
          $test++;
        }
      }
      if ($test = 2){
        $conv_ec = $conv;
        break;
      }
    }
    if($test < '2' ){ //aucune conversation n'existe
      $conversation = new Conversation;
      $conversation->title = "tatata";
      $conversation->save();
      $conversation->users()->attach(auth::user());
      $conversation->users()->attach($destinataire);
      $msg = new msg;
      $msg->message = "Bonjour, l'utilisateur " . auth::user()->name . " a posulé a votre offre : ". $offre->titre." nésiter pas à lui envoyer un message ;)";
      $msg->sender = auth::user()->id;
      $msg->conversation_id = $conversation->id;
      $msg->save();
    }else { //une conversation est deja existante
      $msg = new msg;
      $msg->message = "Bonjour, l'utilisateur " . auth::user()->name . " a posulé a votre offre : ". $offre->titre." nésiter pas à lui envoyer un message ;)";
      $msg->sender = auth::user()->id;
      $msg->conversation_id = $conv_ec->id;
      $msg->save();
    }

    return redirect()->route("offre_entreprise.index");
  }
  public function profil_show(){
    $dev_id = auth::user()->developpeur_id;
    $diplomes = Diplome::where('developpeur_id',$dev_id)->get();
    $experiences = Experience::where('developpeur_id',$dev_id)->get();
    $user =  auth::user();
    return view("front.developpeur.profil")->with('diplomes', $diplomes)
    ->with('experiences', $experiences)
    ->with('user',$user);
  }
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function ajaxRequest()
  {
      $user =  auth::user();
      return view('front.developpeur.conversation')->with('user', $user);
  }
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function ajaxRequestPost(Request $request)
  {
    //Verification des champs
    $request->validate([
     'message'       => 'required|max:255',
     'conversation_id' => 'required',
   ]);

   $user =  auth::user();

   $msg = new msg;
   $msg->message = $request->message;
   $msg->sender = $user->id;
   $msg->conversation_id = $request->conversation_id;
   $msg->save();

   $conversation = conversation::find($request->conversation_id);

    return response()->json(['messages' => $conversation->msgs, 'conversation_user' => $conversation->users , 'conversation' => $conversation]);
  }
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function ajaxRequestSync(Request $request)
  {

    $conversation = conversation::find($request->id);


    return response()->json( ['messages' => $conversation->msgs, 'conversation_user' => $conversation->users , 'conversation' => $conversation]);
  }

}
