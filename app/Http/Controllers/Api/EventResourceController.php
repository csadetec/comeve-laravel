<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EventResource;

class EventResourceController extends Controller
{

  public function store($event_id, $resources)
  {
    //EventResource::where('event_id', $event_id )->delete();

    foreach ($resources as $r) {

      $er = EventResource::where(['event_id' => $event_id, 'resource_id'=>$r['id']])->first();
      if ($er) {
        $er->accept = $r['accept'];
        $er->save();        //$er->event_id = $event_id;
        //$resource_id
      } else {
        $er = new EventResource();
        $er->event_id = $event_id;
        $er->resource_id = $r['id'];
        $er->accept = $r['accept'];
        $er->save();
      }
    }
  }

  public function getEventResouce($event_id, $resource_id)
  {

    //$teste =  EventResource::where(['event_id' => $event_id, 'resource_id' => '1'])->get();
    $er =   EventResource::where(['event_id' => $event_id, 'resource_id' => $resource_id])->first();
    return $er['accept'];
  }
}
