<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class msg extends Model
{
  public function users()
  {
    return $this->belongTo(Conversation::class);
  }
}
