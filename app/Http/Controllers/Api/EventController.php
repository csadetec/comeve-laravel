<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{

  public function index()
  {
    $events = Event::all();

    foreach($events as $r){
      $r->user = $r->user;
    }

    return $events;


  }

  public function store(Request $request)
  {
    $data = $request->only(['name', 'date', 'start', 'end', 'place_id']);
    $data['user_id'] = 1;
    $event = new Event();

    return $event->create($data);

  }

  public function show($id)
  {
    $event = Event::find($id);

    $event->user = $event->user;

    return $event;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
