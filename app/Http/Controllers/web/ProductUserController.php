<?php

namespace App\Http\Controllers\web;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductUserController extends Controller
{
    
    public function index(Request $request)
    {   
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $category = $request->category;
            if (!$keywords and $category) {
                $collection = Product::where('id_product_category', $category)->orderby('id', 'desc')->paginate(20);
            }
            if (!$keywords and !$category) {
                $collection = Product::orderby('id', 'desc')->paginate(20);
            }
            if (!$keywords and $category) {
                $collection = Product::where('id_product_category', $category)
                    ->orderby('id', 'desc')
                    ->paginate(20);
            }   
            if ($keywords and !$category) {
                $collection = Product::where('name_product', 'like', '%' . $keywords . '%')
                    ->orderby('id', 'desc')
                    ->paginate(20);
            }              
            if ($keywords and $category) {
                $collection = Product::where('name_product', 'like', '%' . $keywords . '%')
                    ->where('id_product_category', $category)
                    ->orderby('id', 'desc')
                    ->paginate(20);
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
        $validator = Validator::make($request->all(), [
            'review' => 'required',
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            if($errors->has('review')){
                return response()->json([
                    'alert'=>'error',
                    'message'=>$errors->first('review')
                ]);
            }
        }
        $review = new Review();
        $review->id_user = Auth::user()->id;
        $review->id_product = $product;
        $review->review = $request->review;
        $review->rating = $request->stars;
        $review->created_at = now();
        $review->save();
        $total_rating = Review::where('id_product',$product)->avg('rating');
        Product::where('id',$product)->update(['total_rating'=>$total_rating]);
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