<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('suppliers.index')->with([
            'stores' => Store::where('user_id', Auth::user()->id)->orderBy('designation')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create')->with('stores', Store::where('user_id', Auth::user()->id)->orderBy('designation')->get());
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
            'designation' => 'required|min:3',
            'store' => 'required'

        ]);

        $supplier = new Supplier();

        $supplier->designation = ucfirst($request->designation);
        $supplier->store_id = $request->store;
        $supplier->contact = $request->contact;
        $supplier->email = $request->email;

        $supplier->save();

        session()->flash('success', 'Fornecedor adicionado com sucesso!');


        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $table = $supplier->getAttributes();

        return view('general.show', ['table' => $table, 'designation' => 'Fornecedor']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Suppler $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.create')->with([
            'stores' => Store::where('user_id', Auth::user()->id)->orderBy('designation')->get(),
            'supplier' => $supplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, [
            'designation' => 'required|min:3',
            'store' => 'required'
        ]);

        $supplier->designation = ucfirst($request->designation);
        $supplier->store_id = $request->store;
        $supplier->contact = $request->contact;
        $supplier->email = $request->email;
        $supplier->save();

        session()->flash('success', 'Fornecedor actualizado com sucesso!');

        return redirect()->route('suppliers.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        session()->flash('success', 'Fornecedor removido com sucesso!');

        return redirect()->route('suppliers.index');
    }

    /**
     * Return a list of suppliers by store
     * 
     * @param int $storeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($storeId)
    {

        $suppliers = DB::table('suppliers')
            ->leftJoin('stores', 'stores.id', '=', 'suppliers.store_id')
            ->select('suppliers.id', 'suppliers.designation as designation', 'stores.designation as store', 'suppliers.contact', 'suppliers.email')
            ->where('suppliers.store_id', '=', $storeId)
            ->get();

        return response()->json($suppliers);
    }
}
