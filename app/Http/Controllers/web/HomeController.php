<?php

namespace App\Http\Controllers\web;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    public function index()
    {
        $collection = Product::where('status_product','=','Published')->orderby('id','desc')->paginate(10);
        
        $sale = Product::select('products.id', 'products.total_rating', 'products.price_product','products.name_product','products.id_product_category','products.image_product')
        ->where('status_product','=','Published')
        ->orderBy('products.total_rating','desc')
        ->paginate(10);


        return view('pages.web.home.main',compact('collection','sale'));
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