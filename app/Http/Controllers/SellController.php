<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Category;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Exports\ReceiptsExport;
use Maatwebsite\Excel\Facades\Excel;

class SellController extends Controller
{

    private $user;

    private $receiptId;
    /**
     * Return the sell view 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->user = Auth::user();

        $store = Store::where('id', $this->user->store_id)->first();

        return view('sells.index')->with('store', $store);
    }

    /**
     * Returns a list of products based on its name
     * 
     * @param string productName
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchProduct($productName, $storeId)
    {

        $products = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->leftJoin('stores', 'stores.id', '=', 'categories.store_id')
            ->select('products.designation', 'quantity', 'price', 'products.id', 'suppliers.designation as supplier')
            ->where('products.designation', 'LIKE', "%{$productName}%")
            ->where('stores.id', $storeId)
            ->orderBy('categories.designation')
            ->get();

        return response()->json($products);
    }

    /**
     * Submit a checkout
     * 
     */
    public function checkout(Request $request)
    {

        //$this->export();

        DB::transaction(function () use ($request) {

            $this->receiptId = $this->saveReceipt($request);

            for ($i = 0; $i < count($request->productsId); $i++) {

                $product = Product::find($request->productsId[$i]);

                try {

                    DB::table('items')->insert([
                        'product_name'  => $product->designation,
                        'supplier_name' => $product->supplier->designation,
                        'product_price' => $product->price,
                        'quantity'      => $request->quantities[$i],
                        'sub_total'     => $product->price * $request->quantities[$i],
                        'receipt_id'    => $this->receiptId,
                        'created_at'    => date('Y-m-d H:i:s')
                    ]);

                    $product->quantity -= $request->quantities[$i];

                    $product->save();
                } catch (\Exception $e) {

                    session()->flash('danger', 'Erro na facturacao! Quantidade invalida!');

                    return redirect()->back();
                }
            }
        }, 1);

        session()->flash('success', 'Facturacao efectuada com sucesso! ');

        $receipt = DB::table('receipts')
            ->leftJoin('users', 'users.id', '=', 'receipts.user_id')
            ->leftJoin('stores', 'stores.id', '=', 'users.store_id')
            ->select('receipts.id as ID', 'receipts.created_at', 'stores.designation as store', 'stores.address', 'stores.nuit', 'users.name as operator', 'total', 'paid', 'change', 'customer_name')
            ->where('receipts.id', '=', $this->receiptId)
            ->first();

        $items = Item::where('receipt_id', $this->receiptId)->get();

        if ($request->printReceipt)
            return view('exports.receipt')->with([
                'receipt' => $receipt,
                'items'   => $items
            ]);

        return redirect()->back();
    }

    public function saveReceipt(Request $request)
    {

        $receipt = new Receipt();

        $receipt->paid = $request->paid;

        $receipt->total = $request->hiddenTotal;

        $receipt->change = $request->hiddenChange;

        $receipt->customer_name = $request->customer_name;

        $receipt->day = date('d');

        $receipt->month = date('m');

        $receipt->year = date('Y');

        $receipt->user_id = Auth::user()->id;

        $receipt->store_id = Auth::user()->store_id;

        $receipt->save();

        return $receipt->id;
    }

    public function export()
    {
        return Excel::download(new ReceiptsExport, 'receipts.xlsx');
        //return (new ReceiptsExport)->download('receipts.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }
}
