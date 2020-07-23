<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  public function entreprise()
  {
      return $this->belongsTo('App\Entreprise');
  }
  public function developpeur()
  {
      return $this->belongsTo('App\Developpeur');
  }
}
