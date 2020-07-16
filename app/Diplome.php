<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
  public function developpeur()
  {
      return $this->belongsTo('App\Developpeur');
  }
}
