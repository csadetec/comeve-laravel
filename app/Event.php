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
    //return $this->belongsToMany('App\Resource', 'events_resources')->select('name', 'accept', 'sector_id', 'resource_id');
    //return $this->belongsToMany('App\Resource', 'events_resources')->select('*');
    return $this->belongsToMany('App\Resource', 'events_resources');
  }

  

  public function resourcesTest(){
    return $this->belongsToMany('App\Resource', 'events_resources')->select('resource_id', 'accept');
  }

  public function sector(){
    return $this->belongsTo('App\Sector');
  }
}
