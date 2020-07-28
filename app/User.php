<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  public function entreprise()
  {
      return $this->belongsTo('App\Entreprise');
  }
  public function developpeur()
  {
      return $this->belongsTo('App\Developpeur');
  }
  public function administrateur()
  {
      return $this->belongsTo('App\Administrateur');
  }
  public function messages()
  {
      return $this->hasMany('App\Message');
  }
  public function conversation()
{
    return $this->belongsToMany(Conversation::class);
}



    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
