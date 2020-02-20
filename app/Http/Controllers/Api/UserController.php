<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

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
        
        $username =  User::where('username', $data['username'])->first();
        
        if($username){
            //return $username;
            return ['message'=>'Usuário já Cadastrado'];
        }

        $email = User::where('email', $data['email'])->first();
    
        if ($email) {
          return ['message'=>'Email ja cadastrado'];
        }
        
        if($data['password'] === null){
          return ['message'=>'O Campo senha é obrigatório '];
        }
    
       
    
       
    
        const user = await User.create(data)
    
        return user
        /** */
        //return $data;
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
