<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
  public function offres()
  {
    return $this->hasMany('App\Offre');
  }
  public function user()
  {
    return $this->hasOne('App\User');
  }

}
