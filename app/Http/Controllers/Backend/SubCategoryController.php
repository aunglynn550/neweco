<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    //
    public function SubCategoryView(){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('subcategory','category'));
    }//End Method

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
        ],[
            'category_id.required' => 'Please Select Any Option',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
        ]);

      
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' =>strtolower(str_replace(' ', '-',$request->category_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '-',$request->category_name_hin),
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'SubCategory Inserted Successfully!',
          );
      
         return redirect()->back()->with($notification);
    }//End method

    public function SubCategoryEdit($id){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory','category'));
    }//end mEthod

    public function SubCategoryUpdate(Request $request){
        $subcat_id = $request->id;
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
        ],[
            'category_id.required' => 'Please Select Any Option',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
        ]);

      
        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' =>strtolower(str_replace(' ', '-',$request->category_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '-',$request->category_name_hin),
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'SubCategory Updated Successfully!',
          );
      
         return redirect()->route('view.sub.category')->with($notification);
    }//ENd method

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'alert-type' => 'success',
            'message' => 'SubCategory Deleted Successfully!',
          );
      
         return redirect()->back()->with($notification);
    }
}
