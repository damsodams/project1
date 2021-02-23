<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
  public function entreprise()
  {
      return $this->belongsTo('App\Entreprise');
  }
  public function Postuler_Offre()
  {
      return $this->HasMany('App\Postuler_Offre');
  }
}
