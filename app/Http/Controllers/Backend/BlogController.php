<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPost;
use Carbon\Carbon;
use Image;
class BlogController extends Controller
{
    
    public function BlogCategory(){
        $blogcategory = BlogPostCategory::latest()->get();

        return view('backend.blog.category.category_view',compact('blogcategory'));
    }//end method

    public function BlogCategoryStore(Request $request){

        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_hin' => 'required',            
        ],[
            'blog_category_name_en.required' => 'Input Blog Category English Name',
            'blog_category_name_hin.required' => 'Input Blog Category Hindi Name',
        ]);

      
        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_hin' => $request->blog_category_name_hin,
            'blog_category_slug_en' =>strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
            'blog_category_slug_hin' => str_replace(' ', '-',$request->blog_category_name_hin), 
            'created_at' => Carbon::now(),           
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Blog Category Inserted Successfully!',
          );
      
         return redirect()->back()->with($notification);
    }//end method


    public function BlogCategoryEdit($id){

        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit',compact('blogcategory'));
    }//end method

    public function BlogCategoryUpdate(Request $request){

        $blogcate_id = $request->id;
        

      
        BlogPostCategory::findOrFail($blogcate_id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_hin' => $request->blog_category_name_hin,
            'blog_category_slug_en' =>strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
            'blog_category_slug_hin' => str_replace(' ', '-',$request->blog_category_name_hin), 
            'created_at' => Carbon::now(),           
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Blog Category Updated Successfully!',
          );
      
         return redirect()->route('blog.category')->with($notification);
    }//end method

    ///////////// Blog Post //////////////////
    public function AddBlogPost(){
        $blogcategory = BlogPostCategory::with('category')->latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_view',compact('blogpost','blogcategory'));
    }//end method

    public function ListBlogPost(){
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_list',compact('blogpost'));
    }//end method

    public function BlogPostStore(Request $request){
        $request->validate([
            'post_title_en' => 'required',
            'post_title_hin' => 'required',
            'post_image' => 'required',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780,430)->save('upload/post/'.$name_gen);
        $save_url = 'upload/post/'.$name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_hin' => $request->post_title_hin,
            'post_slug_en' => str_replace(' ', '-',$request->post_title_en),
            'post_slug_hin' => str_replace(' ', '-',$request->post_title_hin),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_hin' => $request->post_details_hin,
            'created_at'        => Carbon::now(),
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Blog Post Inserted Successfully!',
          );
      
         return redirect()->route('list.post')->with($notification);
    }//end method
}
