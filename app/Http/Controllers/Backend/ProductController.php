<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\MultiImg;
use App\Models\Product;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    //
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add',compact('categories','brands'));

    }//End method

    public function StoreProduct(Request $request){

        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
          ]);
      
          if ($files = $request->file('file')) {
            $destinationPath = 'upload/pdf'; // upload path
            $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$digitalItem);
          }

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;
        
        $product_id=Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_chi' => $request->product_name_chi,
            'product_slug_en' =>strtolower(str_replace('','-', $request->product_name_en)),
            'product_slug_chi' => strtolower(str_replace('','-', $request->product_name_chi)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_chi' => $request->product_tags_chi,
            'product_size_en' => $request->product_size_en,
            'product_size_chi' => $request->product_size_chi,
            'product_color_en' => $request->product_color_en,
            'product_color_chi' => $request->product_color_chi,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_chi' => $request->short_descp_chi,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_chi' => $request->long_descp_chi,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' => $save_url,
            'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' =>Carbon::now(),
            
        ]);

        /////////////////Multiple Image Upload ////////////////////

        $images = $request->file('multi_img');

        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi_image/'.$make_name);
            $uploadPath = 'upload/products/multi_image/'.$make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);

        }

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Product Inserted Successfully!',
          );
      
         return redirect()->route('manage-product')->with($notification);


    }//end method

    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }//end method

    public function EditProduct($id){

        $multiImgs = MultiImg::where('product_id',$id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);

        return view('backend.product.product_edit',compact('categories','brands',
                    'subcategory','subsubcategory','products','multiImgs'));
    }//End method

    public function ProductDataUpdate(Request $request){
        $product_id = $request->id;

       Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_chi' => $request->product_name_chi,
            'product_slug_en' =>strtolower(str_replace('','-', $request->product_name_en)),
            'product_slug_chi' => strtolower(str_replace('','-', $request->product_name_chi)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_chi' => $request->product_tags_chi,
            'product_size_en' => $request->product_size_en,
            'product_size_chi' => $request->product_size_chi,
            'product_color_en' => $request->product_color_en,
            'product_color_chi' => $request->product_color_chi,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_chi' => $request->short_descp_chi,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_chi' => $request->long_descp_chi,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'status' => 1,
            'created_at' =>Carbon::now(),
            
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Product Updated without Images Successfully!',
          );
      
         return redirect()->route('manage-product')->with($notification);

    }//End Method


    ///Multiple Image Update
    public function MultiImageUpdate(Request $request){
        $imgs = $request->multi_img;

        foreach($imgs as $id=> $img){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
           
            $name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi_image/'.$name);
            $uploadPath = 'upload/products/multi_image/'.$name;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }//ENd foreach

        $notification = array(
            'alert-type' => 'info',
            'message' => 'Product Images Updated Successfully!',
          );
      
         return redirect()->back()->with($notification);

    }//End Method


    //////Product Thambnail Update////
    public function ThambnailImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'alert-type' => 'info',
            'message' => 'Product Thambnail Updated Successfully!',
          );
      
         return redirect()->back()->with($notification);

    }//End Method


    ////Multi Image Delete////////
    public function MultiImageDelete($id){

        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'alert-type' => 'info',
            'message' => 'Product Image Deleted Successfully!',
          );
      
         return redirect()->back()->with($notification);

    }//End method

    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status'=>0]);
        $notification = array(
            'alert-type' => 'info',
            'message' => 'Product Inactive Successfully!',
          );
      
         return redirect()->back()->with($notification);

    }//End method

    public function ProductActive($id){
        Product::findOrFail($id)->update(['status'=>1]);
        $notification = array(
            'alert-type' => 'info',
            'message' => 'Product Active Successfully!',
          );
      
         return redirect()->back()->with($notification);
        
    }//End method


    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach($images as $img){
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }
        $notification = array(
            'alert-type' => 'info',
            'message' => 'Product Deleted Successfully!',
          );
      
          return redirect()->route('manage-product')->with($notification);

    }//ENd Method


    public function ProductStock(){

        $products = Product::latest()->get();
        return view('backend.product.product_stock',compact('products'));
      }

}
