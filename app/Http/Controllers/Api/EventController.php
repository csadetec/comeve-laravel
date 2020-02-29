<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
//use App\Resource;
use App\Http\Controllers\Api\EventResourceController;
use Illuminate\Support\Facades\Auth;

//use Illuminat
//$teste = new EventResourceController();
class EventController extends Controller
{

  public function index()
  {
    $events = Event::all();

    foreach($events as $r){
      $r->user = $r->user;
      $r->place = $r->place;
      $r->resources = $r->resources;
    }

    return $events;


  }

  public function store(Request $request)
  {
    $data = $request->only(['name', 'date', 'start', 'end', 'place_id']);
    $data['user_id'] = Auth::id();

    $resources = $request->itensResources;

    $event = new Event();

    $event =  $event->create($data);
   
    $er = new EventResourceController();

    $er->store($event->id, $resources);
    
    return $event;

  }

  public function show($id)
  {
    $event = Event::find($id);

    $event->user = $event->user;
    $event->place = $event->place;
    $event->resources = $event->resources;
    
    foreach($event->resources as $r){
      //echo '<pre>';
      $r->sector = $r->sector;
    }
    return $event;
  }

  public function update(Request $request, $id)
  {
    $data = $request->only(['name', 'date', 'start', 'end', 'place_id']);
    $resources = $request->itensResources;
    
    $er = new EventResourceController();

    //return $resources;
    $er->store($id, $resources);
    
    
    
    $event = Event::find($id);

    $event->update($data);
    $event->resources = $event->resources;


    return $event;
    /** */
  }


  public function destroy($id)
  {
    //
  }
}
