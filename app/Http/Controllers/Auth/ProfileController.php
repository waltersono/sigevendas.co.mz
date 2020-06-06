<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

/**
 * Controller responsible for handling user profile managment
 * 
 * @autor Walter Sono
 */
class ProfileController extends Controller
{
    /**
     * Displays the profile managment page
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('auth.profile',['user' => Auth::user()]);
    }

    /**
     * Updates the user's name and email
     * 
     * @param \Illuminate\Http\Request
     * @param \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(Request $request, User $user){
        $this->validate($request, [
            'name'  =>  'required',
            'email' =>  'required|unique:users,email,' . $user->id
        ]);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        session()->flash('success','Perfil actualizado com sucesso!');

        return redirect()->back();
    }

    /**
     * Updates the user's password
     * 
     * @param \Illuminate\Http\Request
     * @param \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, User $user){
        
        $this->validate($request, [
            'current_password'  =>  'required|min:8',
            'new_password' => 'required|min:8|same:new_password_confirmation',
            'new_password_confirmation' =>  'required|min:8'
        ]);

        if(app('hash')->check($request->current_password, $user->password)){

            $user->password = bcrypt($request->new_password);
            $user->save();

            session()->flash('success','Palavra-passe actualizada com sucesso!');

        }else{

            session()->flash('warning','Palavra-passe actual nao coincide!');
            
        }

        return redirect()->back();
    }
       
}
