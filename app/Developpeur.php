<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developpeur extends Model
{
  public function diplomes()
  {
    return $this->hasMany('App\Diplome');
  }
  public function experiences()
  {
    return $this->hasMany('App\Experience');
  }
  public function user()
  {
    return $this->hasOne('App\User');
  }
}
