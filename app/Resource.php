<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
  protected $fillable = [
    'name', 'sector_id'  
  ];

  public function sector(){
    return $this->belongsTo('App\Sector');
  }
}
