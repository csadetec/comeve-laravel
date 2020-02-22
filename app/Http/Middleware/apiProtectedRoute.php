<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware; 
use Tymon\JWTAuth\Facades\JWTAuth;

class apiProtectedRoute extends BaseMiddleware
{

  public function handle($request, Closure $next)
  {
    try{
      $user = JWTAuth::parseToken()->authenticate();
    } catch (\Exception $e){
      if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
        return response()->json(['status'=>'Token is Invalid'], 401);
      }
      if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
        return response()->json(['status'=>'Token is Expired'], 401);
      }

      return response()->json(['status' => 'Authorization Token not found'], 401);
    }

    return $next($request);
  }
}
