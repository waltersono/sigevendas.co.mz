<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stores.index')->with('stores', Store::where('user_id', Auth::user()->id)->orderBy('designation')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'designation' => 'required',
            'address' => 'required'
        ]);

        $store = new Store();
        $store->designation = ucfirst($request->designation);
        $store->address = $request->address;
        $store->nuit = $request->nuit;
        $store->contact = $request->contact;
        $store->user_id = Auth::user()->id;
        $store->save();

        session()->flash('success', 'Estabelecimento adicionado com sucesso!');

        return redirect()->route('stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $table = Store::find($id)->getAttributes();

        return view('general.show', ['table' => $table, 'designation' => 'Estabelecimento']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::where('id', $id)->where('user_id', Auth::user()->id)->first();

        return view('stores.create')->with('store', $store);
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
        $this->validate($request, [
            'designation' => 'required',
            'address' => 'required'
        ]);

        $store = Store::find($id);
        $store->designation = ucfirst($request->designation);
        $store->address = $request->address;
        $store->nuit = $request->nuit;
        $store->contact = $request->contact;
        $store->user_id = Auth::user()->id;
        $store->save();

        session()->flash('success', 'Estabelecimento actualizado com sucesso!');

        return redirect()->route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store = Store::find($id);

        $store->delete();

        session()->flash('success', 'Estabelecimento removido com sucesso!');

        return redirect()->back();
    }
}
