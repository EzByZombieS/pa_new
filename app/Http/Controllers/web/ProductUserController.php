<?php

namespace App\Http\Controllers\web;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProductUserController extends Controller
{
    
    public function index(Request $request)
    {   
        if ($request->ajax()) {
            if($request->category != 'all'){
                $collection = Product::where('status_product','=','Published')->where('id_product_category',$request->category)->paginate(12);
            }else{
                $collection = Product::where('status_product','=','Published')->paginate(12);
            }
            return view('pages.web.myproduct.list',compact('collection'));
        }
        // $collection = Product::where('status_product','=','Published')->paginate(18);
        return view('pages.web.myproduct.main');
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request,$product)
    {
        Review::create([
            'id_user'=>Auth::user()->id,
            'id_order'=>$product,
            'review'=>$request->review,
        ]);
        return response()->json([
            'alert' => 'success',
            'message' => 'Review Berhasil Ditambahkan'
        ]);
    }

    
    public function show(Product $product)
    {
        return view('pages.web.myproduct.desc',compact('product'));     
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
        //
    }
}