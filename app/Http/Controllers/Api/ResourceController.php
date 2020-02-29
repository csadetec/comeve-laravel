<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Resource;

class ResourceController extends Controller
{

  public function index()
  {
    //$resources = Resource::all();
    $resources = Resource::orderBy('name', 'asc')->get();

    foreach($resources as $r){
      $r->sector = $r->sector;
    }

    return $resources;
  }


  public function store(Request $request)
  {
    $data = $request->only(['name', 'sector_id']);

    $resource = new Resource();

    return $resource->create($data);

  }

  public function show($id)
  {
    $resource = Resource::find($id);

    return $resource;
  }


  public function update(Request $request, $id)
  {
    $data = $request->only(['name', 'sector_id']);

    $resource = Resource::find($id);

    $resource->update($data);

    return $resource;
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
