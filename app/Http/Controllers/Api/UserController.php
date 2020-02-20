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

    $username =  User::where('username',$request->username)->first();

    if ($username) {
      //return $username;
      return ['message' => 'Usuário já Cadastrado'];
    }

    $email = User::where('email', $request->email)->first();

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

    return $user;
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }
}
