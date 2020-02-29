<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sector;

class SectorController extends Controller
{

  public function index()
  {
    $sectors = Sector::orderBy('name', 'asc')->get();
    //$sectors = Sector::all();

    return $sectors;
  }

  public function store(Request $request)
  {
    $data = $request->only(['name']);
    
    $sector = new Sector();

    return $sector->create($data);

  }


  public function show($id)
  {
    $user = Sector::find($id);

    return $user;
  }

  public function update(Request $request, $id)
  {
    $data = $request->only(['name']);

    $sector = Sector::find($id);

    $sector->update($data);

    return $sector;

  }


  public function destroy($id)
  {
    //
  }
}
