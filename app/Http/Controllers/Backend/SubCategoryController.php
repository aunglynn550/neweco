<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

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
            'subcategory_name_chi' => 'required',
        ],[
            'category_id.required' => 'Please Select Any Option',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
        ]);

      
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_chi' => $request->subcategory_name_chi,
            'subcategory_slug_en' =>strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
            'subcategory_slug_chi' => str_replace(' ', '-',$request->subcategory_name_chi),
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
            'subcategory_name_chi' => 'required',
        ],[
            'category_id.required' => 'Please Select Any Option',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
        ]);

      
        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_chi' => $request->subcategory_name_chi,
            'subcategory_slug_en' =>strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
            'subcategory_slug_chi' => str_replace(' ', '-',$request->subcategory_name_chi),
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
    }//end method



    /////////////////For Sub Sub category//////////////////

    public function SubSubCategoryView(){

        $category = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view',compact('subsubcategory','category'));

    }//End method 

    public function GetSubCategory($category_id){
        $subcategory =  SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();

        return json_encode($subcategory);
    }//End method


    public function GetSubSubCategory($subcategory_id){
        $subsubcategory =  SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();

        return json_encode($subsubcategory);
    }//End method

    public function SubSubCategoryStore(Request $request){
        
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_chi' => 'required',
      
        ]);

      
        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_chi' => $request->subsubcategory_name_chi,
            'subsubcategory_slug_en' =>strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_chi' => str_replace(' ', '-',$request->subsubcategory_name_chi),
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'SubSubCategory Inserted Successfully!',
          );
      
       
        return redirect()->back()->with($notification);

    }//ENd method

    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit',compact('categories','subcategories','subsubcategories'));

    }//End method

    public function SubSubCategoryUpdate(Request $request){
        $subsubcat_id = $request->id;
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_chi' => 'required',
        ]);

      
        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_chi' => $request->subsubcategory_name_chi,
            'subsubcategory_slug_en' =>strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_chi' => str_replace(' ', '-',$request->subsubcategory_name_chi),
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'SubSubCategory Updated Successfully!',
          );
      
         return redirect()->route('view.sub.subcategory')->with($notification);

    }//End method

    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'alert-type' => 'success',
            'message' => 'SubSubCategory Deleted Successfully!',
          );
      
         return redirect()->route('view.sub.subcategory')->with($notification);

    }
}
