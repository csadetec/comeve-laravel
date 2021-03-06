<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    $credentials = $request->only(['email', 'password']);

    $user = User::where('email', $request->email)->first();
    $user->sector = $user->sector;

    //return $credentials;
    if(empty($user)){
      return response()->json(['error' => 'Email not exist'], 401);
    }

    if (!$token = auth('api')->attempt($credentials)) {
      return response()->json(['error' => 'Password Invalid'], 401);
    }

    //$token
    //return $this->respondWithToken($token);
    return $this->respondWithToken($token, $user);
  }

  protected function respondWithToken($token, $user)
  {
    return response()->json([
      'user' => $user,
      'access_token' => $token,
      'token_type' => 'bearer',
      //'expires_in' => auth('api')->factory()->getTTL() * 604800
    ]);
  }
}
