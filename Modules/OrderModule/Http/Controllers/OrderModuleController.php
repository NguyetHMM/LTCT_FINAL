<?php

namespace Modules\OrderModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Modules\OrderModule\Entities\OrderDetailModel as OrderDetailModel;
use Session;
use Auth;
class OrderModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('ordermodule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ordermodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
        $products = DB::table('cart_details')
        ->join('tbl_product','tbl_product.product_id','=','cart_details.product_id')
        ->where('user_id', Auth::user()->id)
        ->get();
        // dd($products[1]->total);
        $totalOrder = 0;
        foreach($products as $pro){
            $totalOrder += $pro->total;
        }
        // dd($totalOrder);
        return view('ordermodule::showOrderForm',compact('products','totalOrder'));
    }

    public function addToCart(Request $request)
    {  
        // dd($request);
        $addQuantity = DB::table('cart_details')
        ->where('product_id',$request->product_id)
        ->where('user_id',Auth::user()->id)
        ->get();
        // Handle save to database 
        $count = count($addQuantity);
        if($count != 0){
            $qty = $addQuantity[0]->quantity;
            $oldTotal = $addQuantity[0]->total;
            DB::table('cart_details')
            ->where('product_id',$request->product_id)
            ->update(['quantity' => ($qty+$request->product_qty),
                        'total' => ($oldTotal + $request->product_qty*$request->price)
            ]);
        } else{
            $data['product_id'] = $request->product_id;
            $data['quantity'] = $request->product_qty;
            $data['user_id'] = Auth::user()->id;
            $data['total'] = ($request->product_qty*$request->price);
            DB::table('cart_details')->insert($data);
        }
        return redirect()->action([OrderModuleController:: class,'show']);
    }

    public function deleteProductInCart(Request $request)
    {
        DB::table('cart_details')
            ->where('product_id', $request->product_id)
            ->where('user_id', Auth::user()->id)
            ->delete();
        return redirect()->action([OrderModuleController:: class,'show']);
    }

    public function show_detail($product_id){
        $product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        // dd($product);
        return view('ordermodule::productDetail')->with('show_detail', $product);
    }

}
