<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = array();

        if (Auth::user()->role == 'Administrator') {

            $users = User::orderBy('role')->get();
        } else if (Auth::user()->role == 'Manager') {

            $users = User::where('user_id', Auth::user()->id)->where('role', 'Operator')->orderBy('name')->get();
        }

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $stores = Store::where('user_id', Auth::user()->id)->orderBy('designation')->get();

        return view('users.create')->with('stores', $stores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::user()->role == 'Administrator') {

            $this->validate($request, [
                'name'  =>  'required|min:3',
                'email' =>  'required|unique:users',
            ]);
        } else {

            $this->validate($request, [
                'name'  =>  'required|min:3',
                'email' =>  'required|unique:users',
                'store' =>  'required'
            ]);
        }

        $user = new User();

        $user->name = $request->name;

        $user->email = $request->email;


        $user->role = $request->role;

        $user->password = Hash::make('password');

        if (Auth::user()->role == 'Manager') {

            $user->user_id =  Auth::user()->id;

            $user->role = 'Operator';

            $user->store_id = $request->store;
            
        }

        $user->save();

        session()->flash('success', 'Usuario criado com sucesso!');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['table' => $user->getAttributes()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $stores = Store::where('user_id', Auth::user()->id)->orderBy('designation')->get();

        return view('users.create', ['user' => User::find($user->id), 'stores' => $stores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->role == 'Administrator') {

            $this->validate($request, [
                'name'  =>  'required|min:3',
                'email' =>  'required|unique:users',
            ]);
        } else {

            $this->validate($request, [
                'name'  =>  'required|min:3',
                'email' =>  'required|unique:users',
                'store' =>  'required'
            ]);
        }

        $user->name = $request->name;

        $user->email = $request->email;

        if (Auth::user()->role == 'Manager') {

            $user->user_id =  Auth::user()->id;

            $user->role = 'Operator';

            $user->store_id = $request->store;
        }

        $user->save();

        session()->flash('success', 'Usuario actualizado com sucesso!');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::user()->id == $user->id) {

            session()->flash('danger', 'Usuario autenticado nao pode ser removido!');
        } else {

            $user->delete();

            session()->flash('success', 'Usuario removido com sucesso!');
        }

        return redirect()->route('users.index');
    }
}
