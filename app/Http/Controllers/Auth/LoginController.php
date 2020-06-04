<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){

    }

    public function signIn(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'password'  => 'required'
        ]);

        $user = User::where('email',$request->email)->first();

        auth()->login($user);

        return redirect()->route('home');
    }
    
}
