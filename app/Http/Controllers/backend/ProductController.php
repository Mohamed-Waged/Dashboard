<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\traits\media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use media;

    public function index(){
        $products = DB::table('products')->select('id','name_en','name_ar','price','quantity','status','code','created_at')->get();
        return view('backend.products.index',compact('products'));
    }

    public function create(){
        $brands = DB::table('brands')->get();
        $subcategories = DB::table('subcategories')->select('id','name_en')->where('status',1)->get();
        return view('backend.products.create',compact('brands','subcategories'));
    }

    public function store(StoreProductRequest $request){

        // Upload Image
        $imageName = $this->uploadPhoto($request->image,'products');

        // Insert 
        $data = $request->except('_token','image','page');
        $data['image'] = $imageName ;
        DB::table('products')->insert($data);

        // Redirect
        if ($request->page == 'back') {
            return redirect()->back()->with('success','Product Created Successfully');
        }else{
            return redirect()->route('products.index')->with('success','Product Created Successfully');
        }
    }

    public function edit($id){
        $product = DB::table('products')->where('id',$id)->first();
        $brands = DB::table('brands')->get();
        $subcategories = DB::table('subcategories')->select('id','name_en')->where('status',1)->get();
        return view('backend.products.edit',compact('product','brands','subcategories'));
    }

    public function update(UpdateProductRequest $request , $id){

        $data = $request->except('_token','_method','image','page');

        if ($request->has('image')) {
            // Remove old image
            $oldPhotoName = DB::table('products')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path("/dist/img/products/$oldPhotoName");
            $this->deletePhoto($photoPath);

            // Upload image
            $imageName = $this->uploadPhoto($request->image,'products');
            $data['image'] = $imageName ;
        }
        
        // update product
        DB::table('products')->where('id',$id)->update($data);

        // redirect
        return redirect()->route('products.index')->with('success','Product Updated Successfully');
    }

    public function destroy($id){
        // Remove image
        $oldPhotoName = DB::table('products')->select('image')->where('id',$id)->first()->image;
        $photoPath = public_path("/dist/img/products/$oldPhotoName");
        $this->deletePhoto($photoPath);

        // Delete product
        DB::table('products')->where('id', $id)->delete();

        // redirect
        return redirect()->back()->with('success','Product Deleted Successfully');
    }
}