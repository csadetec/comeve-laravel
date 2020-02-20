<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;

class PlaceController extends Controller
{

  public function index()
  {
    $places = Place::all();

    return $places;
  }


  public function store(Request $request)
  {
    $data = $request->only(['name']);

    $place = new Place();

    return $place->create($data);
  }

  public function show($id)
  {
    $place = Place::find($id);

    return $place;
  }


  public function update(Request $request, $id)
  {
    $data = $request->only(['name']);
    $place =  Place::find($id);

    $place->update($data);

    return $place;

  }


  public function destroy($id)
  {
    //
  }
}
