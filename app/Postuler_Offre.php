<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postuler_Offre extends Model
{
  public function offre()
  {
      return $this->belongsTo('App\Offre');
  }
  public function developpeur()
    {
        return $this->belongsTo('App\Developpeur');
    }
}
