<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index')->with([
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
        return view('categories.create')->with('stores', Store::where('user_id', Auth::user()->id)->orderBy('designation')->get());
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

        $category = new Category();

        $category->designation = ucfirst($request->designation);
        $category->store_id = $request->store;

        $category->save();

        session()->flash('success', 'Categoria adicionada com sucesso!');


        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $table = $category->getAttributes();

        return view('general.show', ['table' => $table, 'designation' => 'Categoria']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.create')->with([
            'stores' => Store::where('user_id', Auth::user()->id)->orderBy('designation')->get(),
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'designation' => 'required|min:3',
            'store' => 'required'
        ]);

        $category->designation = ucfirst($request->designation);
        $category->store_id = $request->store;
        $category->save();

        session()->flash('success', 'Categoria actualizada com sucesso!');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Categoria removida com sucesso!');

        return redirect()->route('categories.index');
    }

    /**
     * Return a list of categories by store
     * 
     * @param int $storeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($storeId)
    {

        $categories = DB::table('categories')
            ->leftJoin('stores', 'stores.id', '=', 'categories.store_id')
            ->select('categories.id', 'categories.designation as designation', 'stores.designation as store')
            ->where('categories.store_id', '=', $storeId)
            ->get();

        return response()->json($categories);
    }
}
