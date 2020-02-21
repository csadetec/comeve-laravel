<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
  protected $fillable = [
    'name', 'date', 'start', 'end', 'place_id', 'user_id'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function place(){
    return $this->belongsTo('App\Place');
  }

  public function resources(){
    return $this->belongsToMany('App\Resource', 'events_resources');
  }

}
