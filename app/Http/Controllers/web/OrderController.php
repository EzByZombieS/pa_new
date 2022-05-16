<?php

namespace App\Http\Controllers\web;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $random_string = Auth::user()->id.md5(microtime()).Str::of(Auth::user()->name)->replace(' ', '') ?: 0;
        $detail = Cart::where('id_user', Auth::user()->id)->get();
        $order = new Order;
        $order->id_user = Auth::user()->id;
        $order->order_number = $random_string;
        $order->total = $request->total;
        $order->status = 'waiting';
        $order->created_at = now();
        $order->updated_at = now();
        $order->save();
        foreach ($detail as $item) {
            $order_detail = new OrderDetail;
            $order_detail->id_order = $order->id;
            $order_detail->id_product = $item->id_product;
            $order_detail->total_price = $request->total_price;
            $order_detail->qty = $item->qty;
            $order_detail->created_at = now();
            $order_detail->updated_at = now();
            $order_detail->save();
            $item->delete();
        }
        $message = "Halo, nama saya " . Auth::user()->name . " saya membeli produk dengan nomor order : " . $order->order_number;
        
        return response()->json([
            'alert' => 'success',
            'message' => 'Order berhasil dibuat',
            'redirect' => "https://wa.me/6283867525611?text=$message"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
