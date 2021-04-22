<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function LoginAdmin(){
        return view('login');
    }
    public function PostLoginAdmin(Request $request){
        $remember = $request->has('remember_me')? true : false;
        if(auth()->attempt([
            'email'=> $request->email,
            'password'=>$request->password
        ], $remember)){
            return redirect()->to('home');
        }
    }
}
