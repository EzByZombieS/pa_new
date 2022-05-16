<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductAdminController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $category = $request->category;
            $status = $request->status;
            if (!$keywords or !$category or !$status) {
                $collection = Product::paginate(10);
            }
            if ($keywords and !$category or !$status) {
                $collection = Product::where('name_product', 'like', '%' . $keywords . '%')->paginate(10);
            }
            if (!$keywords and $category and !$status) {
                $collection = Product::where('id_product_category', $category)->paginate(10);
            }
            if (!$keywords and !$category and $status) {
                $collection = Product::where('status_product', $status)->paginate(10);
            }
            if (!$keywords and !$category and $status=="all") {
                $collection = Product::paginate(10);
            }
            if (!$keywords and $category and $status) {
                $collection = Product::where('id_product_category', $category)
                    ->where('status_product', $status)
                    ->paginate(10);
            }     
            if ($keywords and $category and !$status) {
                $collection = Product::where('name_product', 'like', '%' . $keywords . '%')
                    ->where('id_product_category', $category)
                    ->paginate(10);
            }            
            if ($keywords and $category and $status) {
                $collection = Product::where('name_product', 'like', '%' . $keywords . '%')
                    ->where('id_product_category', $category)
                    ->where('status_product', $status)
                    ->paginate(10);
            }            
            return view('pages.admin.product.list',compact('collection'));
        }
        $category = ProductCategory::get();
        return view('pages.admin.product.main',compact('category'));
    }

    
    public function create()
    {
        $product_category = ProductCategory::get();
        return view('pages.admin.product.input',['data'=>new Product,'product_category'=>$product_category]);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_product_category' => 'required',
            'status_product' => 'required',
            'name_product' => 'required',
            'description_product' => 'required',
            'price_product' => 'required',
            'image_product' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('id_product_category')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_product_category'),
                ]);
            }elseif ($errors->has('status_product')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status_product'),
                ]);
            }elseif ($errors->has('name_product')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name_product'),
                ]);
            }
            elseif ($errors->has('description_product')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description_product'),
                ]);
            }
            elseif ($errors->has('price_product')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('price_product'),
                ]);
            }elseif ($errors->has('image_product')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('image_product'),
                ]);
            }
        }

        $file = $request->file('image_product');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'asset/gambar';

        $file->move($tujuanFile, $namaFile);

        $data = new Product;
        $data->id_product_category = $request->id_product_category;
        $data->status_product = $request->status_product;
        $data->name_product = $request->name_product;
        $data->image_product = $namaFile;
        $data->description_product = $request->description_product;
        $data->price_product = $request->price_product;
        $data->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Product '. $data->name_product . ' tersimpan',
        ]);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $data = Product::find($id);
        $product_category = ProductCategory::get();
        return view('pages.admin.product.input',['data'=>$data,'product_category'=>$product_category]);
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_product_category' => 'required',
            'status_product' => 'required',
            'name_product' => 'required',
            'description_product' => 'required',
            'price_product' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('id_product_category')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_product_category'),
                ]);
            }elseif ($errors->has('status_product')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status_product'),
                ]);
            }elseif ($errors->has('name_product')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name_product'),
                ]);
            }
            elseif ($errors->has('description_product')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description_product'),
                ]);
            }
            elseif ($errors->has('price_product')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('price_product'),
                ]);
            }elseif ($errors->has('image_product')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('image_product'),
                ]);
            }
        }

        if($request->hasfile('image_product')){
            $file = $request->file('image_product');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'asset/gambar';
    
            $file->move($tujuanFile, $namaFile);
            
            $data = Product::find($id);
            $data->id_product_category = $request->id_product_category;
            $data->status_product = $request->status_product;
            $data->name_product = $request->name_product;
            $data->image_product = $namaFile;
            $data->description_product =$request->description_product;
            $data->price_product = $request->price_product;
            $data->update();
        }else{        
            $data = Product::find($id);
            $data->id_product_category = $request->id_product_category;
            $data->status_product = $request->status_product;
            $data->name_product = $request->name_product;
            $data->description_product = $request->description_product;
            $data->price_product = $request->price_product;
            $data->update();
        }

        return response()->json([
            'alert' => 'success',
            'message' => 'Product '. $data->name_product . ' berhasil diubah',
        ]);
    }

    
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'alert'=>'success',
            'message'=>'Data '.$product->name_product.' berhasil dihapus'
        ]);
    }

    public function published(Product $product)
    {
        $product->status_product = 'Published';
        $product->update();
        return response()->json([
            'alert'=>'success',
            'message'=>'Data '.$product->name_product.' berhasil dipublished'
        ]);
    }
    
    public function inactive(Product $product)
    {
        $product->status_product = 'Inactive';
        $product->update();
        return response()->json([
            'alert'=>'success',
            'message'=>'Data '.$product->name_product.' berhasil diinactive'
        ]);
    }
}