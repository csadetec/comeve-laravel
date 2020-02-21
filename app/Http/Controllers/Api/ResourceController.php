<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Resource;

class ResourceController extends Controller
{

  public function index()
  {
    $resources = Resource::all();

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

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
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
