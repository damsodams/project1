<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\user;
use App\Conversation;
use App\msg;
class AjaxController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function ajaxRequest()
  {
      $user =  auth::user();
      return view('front.entreprise.conversation.index')->with('user', $user);
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
