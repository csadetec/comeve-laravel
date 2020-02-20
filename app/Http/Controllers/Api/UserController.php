<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  public function index()
  {
    $users = User::all();
    
    return $users;
  }


  public function store(Request $request)
  {
    $data = $request->only(['username', 'name', 'email', 'password', 'sector_id']);

    $email = User::where('email', $data['email'])->first();

    if ($email) {
      return ['message' => 'Email ja cadastrado'];
    }

    if (empty($request->password)) {
      return ['message' => 'O Campo senha é obrigatório '];
    }


    $user = new User();
    return $user->create($data);


  }


  public function show($id)
  { 
    $user = User::find($id);
    $user->sector = $user->sector;
    //return $user;

    return $user;
  }

  public function update(Request $request, $id)
  {
    $data = $request->only(['name', 'email', 'password', 'sector_id']);
    $user = User::find($id);
  
    $user->update($data);
    //return $data;
    return $user;
   
  }

  public function destroy($id)
  {
    //
  }
}
