<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller responsible for managing autentication issues
 * 
 * @autor Walter Sono
 * 
 */
class LoginController extends Controller
{
    /**
     * Display the login page
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('auth.login');
    }

    /**
     * Authenticate the user
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request){
        
        $this->validate($request,[
            'email' => 'required|email',
            'password'  => 'required'
        ]);

        $credentials = array('email' => $request->email, 'password' => $request->password);

        if(Auth::attempt($credentials,$request->remember)){
            return redirect()->route('dashboard');
        }

        session()->flash('danger','Email e palavra-passe nao correspondem!');

        return redirect()->route('login');
    }


    /**
     * Logout the user
     * 
     * @return \Illuminate\Http\Response
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    
}
