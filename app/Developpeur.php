<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developpeur extends Model
{
  public function diplomes()
  {
      return $this->hasMany('App\diplomes');
  }
  public function experiences()
  {
      return $this->hasMany('App\experience');
  }
}
