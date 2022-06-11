<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderAdmin;

class OrderAdminController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = OrderAdmin::select('orders.order_number','users.name','orders.total','orders.status', 'orders.id', 'products.name_product', 'products.image_product')->join('orders_details', 'orders.id', '=', 'orders_details.id_order')
            ->join('products', 'orders_details.id_product', '=', 'products.id')->join('users','users.id','=','orders.id_user')
            ->where('users.name','LIKE','%'.$keywords.'%')
            ->orWhere('products.name_product','LIKE','%'.$keywords.'%')
            ->orderby('orders.id','desc')
            ->paginate(10);
            return view('pages.admin.order.list',compact('collection'));
        }
        return view('pages.admin.order.main');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return response()->json([
            'alert'=>'success',
            'message'=>'Data berhasil dipublished'
        ]);
    }

    public function selesai(Order $order)
    {
        $order->status = 'Pesanan Selesai';
        $order->update();
        return response()->json([
            'alert'=>'success',
            'message'=>'status berhasil diubah'
        ]);
    }
}