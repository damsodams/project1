<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  public function emetteur()
  {
      return $this->belongsTo('App\User');
  }
  public function destinatair()
  {
      return $this->belongsTo('App\User');
  }
}
