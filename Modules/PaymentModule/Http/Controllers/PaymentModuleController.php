<?php

namespace Modules\PaymentModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
class PaymentModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('paymentmodule::index');
    }

    public function checkout(Request $request){
        // dd($request->all()); 
        // dd($request['total']);
        $data=array();
        $product_count = $request->product_count;
        for($i = 0; $i < $product_count; $i++){
            $data['user_id'] = Auth::user()->id;
            $data['product_id'] = $request['hidden_product'.$i];
            $data['quantity'] = $request['number_select'.$i];
            $temp = DB::table('tbl_product')
                ->where('product_id', $data['product_id'])
                ->get();
            // dd($temp[0]);
            $data['total'] = $temp[0]->product_price*$data['quantity'];
            DB::table('cart_details')->where(['product_id' => $data['product_id'],'user_id' => $data['user_id']])->update($data);
        }
        return \redirect()->route('show-pay');
    }

    public function show(){
        $products = DB::table('cart_details')
        ->join('tbl_product','tbl_product.product_id','=','cart_details.product_id')
        ->where('user_id',Auth::user()->id)
        ->get();
        // dd($totalOrder);
        $totalOrder = 0;
        foreach($products as $pro){
            $totalOrder += $pro->total;
        }
        return view('paymentmodule::shop-checkout',[
            'products' => $products,
            'totalOrder' => $totalOrder
        ]);
    }

    public function confirmCheckout(Request $request){
        // dd($request);
        $infoOrder = [
            'name' => $request->firstname.' '.$request->lastname,
            'address' => $request->address,
            'email' => $request->email,
            'phonenumber' => $request->phone_num
        ];
        $order = [
            'user_id' => Auth::user()->id,
            'state' => "complete",
            'total' => $request->totalOrder,
            'orderDate' => now()
        ];
        DB::table('orders')->insert($order);
        $maxIdOrder = DB::table('orders')->select('id')->orderByDesc('id')->get();
        $toSaveOrderDetail = DB::table('cart_details')->where('user_id',Auth::user()->id)
        ->get();
        // dd($maxIdOrder[0]->id);
        // DB::table('order_details')
        foreach($toSaveOrderDetail as $detail){
            $toSave = [
                'order_id' => $maxIdOrder[0]->id,
                'product_id' => $detail->product_id,
                'quantity' => $detail->quantity,
                'price' => $detail->total
            ];
            DB::table('order_details')->insert($toSave);
        }

        DB::table('cart_details')->where('user_id', '=', Auth::user()->id)->delete();
        return view('paymentmodule::afterPay',\compact('infoOrder'));
    }
}
