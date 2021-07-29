<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use App\Helpers\Helper;
use App\Models\EntranceLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with([
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
        return view('products.create')->with([
            'stores' => Store::where('user_id', Auth::user()->id)->orderBy('designation')->get()
        ]);
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
            'category' => 'required',
            'supplier' => 'required',
            'designation' => 'required',
            'price' => 'required',
        ]);

        $product = new Product();
        $product->designation = ucfirst($request->designation);
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->supplier_id = $request->supplier;
        $product->save();

        session()->flash('success', 'Produto adicionado com sucesso!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $table = $product->getAttributes();

        return view('general.show', ['table' => $table, 'designation' => 'Produto']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::find($product->category_id);
        $supplier = Supplier::find($product->supplier_id);

        $choosenStoreId = Store::find($category->store_id);

        return view('products.create')->with([
            'stores' => Store::where('user_id', Auth::user()->id)->orderBy('designation')->get(),
            'product' => $product,
            'store_id' => $choosenStoreId->id,
            'category_id' => $category->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'category' => 'required',
            'supplier' => 'required',
            'designation' => 'required',
            'price' => 'required',
        ]);

        $product->designation = ucfirst($request->designation);
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->supplier_id = $request->supplier;

        $product->save();

        session()->flash('success', 'Produto actualizado com sucesso!');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        session()->flash('success', 'Produto removido com sucesso');

        return redirect()->back();
    }

    /**
     * Search products by store and/or category
     * 
     * @param int $storeId
     * @param int $categoryId
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($store, $category, $supplier)
    {

        if ($category !== '*' && $supplier === '*') {

            $products = DB::table('products')
                ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftJoin('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->leftJoin('stores', 'stores.id', '=', 'categories.store_id')
                ->select('products.id as id', 'products.designation', 'price', 'quantity', 'stores.designation as store', 'categories.designation as category', 'suppliers.designation as supplier')
                ->where('category_id', $category)
                ->get();
        } elseif ($category === '*' && $supplier !== '*') {

            $products = DB::table('products')
                ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftJoin('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->leftJoin('stores', 'stores.id', '=', 'categories.store_id')
                ->select('products.id as id', 'products.designation', 'price', 'quantity', 'stores.designation as store', 'categories.designation as category', 'suppliers.designation as supplier')
                ->where('supplier_id', $supplier)
                ->get();
        } elseif ($category !== '*' && $supplier !== '*') {

            $products = DB::table('products')
                ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftJoin('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->leftJoin('stores', 'stores.id', '=', 'categories.store_id')
                ->select('products.id as id', 'products.designation', 'price', 'quantity', 'stores.designation as store', 'categories.designation as category', 'suppliers.designation as supplier')
                ->where('supplier_id', $supplier)
                ->where('category_id', $category)
                ->get();
        } else if ($store !== '*' && $category === '*' && $supplier === '*') {

            $products = DB::table('products')
                ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftJoin('suppliers', 'suppliers.id', '=', 'products.supplier_id')

                ->leftJoin('stores', 'stores.id', '=', 'categories.store_id')
                ->select('products.id as id', 'products.designation', 'price', 'quantity', 'stores.designation as store', 'categories.designation as category', 'suppliers.designation as supplier')
                ->where('categories.store_id', $store)
                ->get();
        } else {

            $products = array();
        }


        return response()->json($products);
    }

    /**
     * Add quantities to products
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {

        $this->validate($request, [
            'id' => 'required',
            'add_quantity' => 'required'
        ]);

        $product = Product::find($request->id);

        //dd();

        $old_quantity = $product->quantity;

        $add_quantity = $request->add_quantity;

        $product->quantity += $request->add_quantity;

        if ($product->save()) {

            $this->addEntranceLog($product, $old_quantity, $add_quantity);

            session()->flash('success', 'Adicionada ' . $request->new_quantity . ' unidades a ' . $request->product . ' com sucesso!');
        } else {

            session()->flash('danger', 'Nao foi possivel efectuar o processamento!');
        }


        return redirect()->back();
    }

    public function addEntranceLog($product, $old_quantity, $add_quantity)
    {

        $log = new EntranceLog();

        $log->product_category = $product->category->designation;

        $log->product_name = $product->designation;

        $log->old_quantity = $old_quantity;

        $log->add_quantity = $add_quantity;

        $log->new_quantity = $product->quantity;

        $log->store_id = $product->category->store->id;

        $log->day = date('d');

        $log->month = date('m');

        $log->year = date('Y');

        $log->save();
    }
}
