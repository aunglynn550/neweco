<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    //
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view',compact('brands'));
    }//ENd method

    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_chi' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_chi.required' => 'Input Brand Chinese Name',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_chi' => $request->brand_name_chi,
            'brand_slug_en' =>strtolower(str_replace(' ', '-',$request->brand_name_en)),
            'brand_slug_chi' => str_replace(' ', '-',$request->brand_name_chi),
            'brand_image' => $save_url,
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Brand Inserted Successfully!',
          );
      
         return redirect()->back()->with($notification);

    }//End method

    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit',compact('brand'));
    }//End Method

    public function BrandUpdate(Request $request){

        $brand_id = $request->id;
        $old_image = $request->old_image;

        if($request->file('brand_image')){

            @unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;
    
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_chi' => $request->brand_name_chi,
                'brand_slug_en' =>strtolower(str_replace(' ', '-',$request->brand_name_en)),
                'brand_slug_chi' => str_replace(' ', '-',$request->brand_name_chi),
                'brand_image' => $save_url,
            ]);
    
            $notification = array(
                'alert-type' => 'success',
                'message' => 'Brand Updated Successfully!',
              );
          
             return redirect()->route('all.brand')->with($notification);

        }else{

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_chi' => $request->brand_name_chi,
                'brand_slug_en' =>strtolower(str_replace(' ', '-',$request->brand_name_en)),
                'brand_slug_chi' => str_replace(' ', '-',$request->brand_name_chi),
               
            ]);
    
            $notification = array(
                'alert-type' => 'success',
                'message' => 'Brand Updated Successfully!',
              );
          
             return redirect()->route('all.brand')->with($notification);


        }//end else

     
    }//End Method

    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Brand Deleted Successfully!',
          );
      
         return redirect()->route('all.brand')->with($notification);
    }//ENd MEthod

}
