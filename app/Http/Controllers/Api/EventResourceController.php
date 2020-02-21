<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EventResource;

class EventResourceController extends Controller
{

  public function store($event_id, $resources)
  {
    EventResource::where('event_id', $event_id )->delete();

    foreach ($resources as $r) {
      $er = new EventResource();
      $er->event_id = $event_id;
      $er->resource_id = $r;
      $er->save();
    }
  }
}
