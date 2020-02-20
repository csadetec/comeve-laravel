<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
    'name', 'date', 'start', 'end', 'place_id', 'user_id'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }
  
}
