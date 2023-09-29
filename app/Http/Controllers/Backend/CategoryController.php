<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function CategoryView(){
        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));
    }//End Method

    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_chi' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'Input Category English Name',
            'category_name_chi.required' => 'Input Category Chinese Name',
        ]);

      
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_chi' => $request->category_name_chi,
            'category_slug_en' =>strtolower(str_replace(' ', '-',$request->category_name_en)),
            'category_slug_chi' => str_replace(' ', '-',$request->category_name_chi),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Category Inserted Successfully!',
          );
      
         return redirect()->back()->with($notification);
    }//End method

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }//end mEthod

    public function CategoryUpdate(Request $request){
        $cat_id = $request->id;

        Category::findOrFail($cat_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_chi' => $request->category_name_chi,
            'category_slug_en' =>strtolower(str_replace(' ', '-',$request->category_name_en)),
            'category_slug_chi' => str_replace(' ', '-',$request->category_name_chi),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Category Updated Successfully!',
          );
      
         return redirect()->route('view.category')->with($notification);

    }//end mEthod

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Category Deleted Successfully!',
          );
      
         return redirect()->route('view.category')->with($notification);
    }//ENd MEthod
}
