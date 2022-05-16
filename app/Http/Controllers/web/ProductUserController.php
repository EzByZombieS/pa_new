<?php

namespace App\Http\Controllers\web;

use App\Models\Product;
use Illuminate\Http\Request;
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
    
    public function store(Request $request)
    {
        //
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