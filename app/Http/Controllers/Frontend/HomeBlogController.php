<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    public function AddBlogPost(){
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('frontend.blog.blog_list',compact('blogpost','blogcategory'));
    }// end method

    public function DetailsBlogPost($id){
        $blogpost = BlogPost::findOrFail($id);
        $blogcategory = BlogPostCategory::latest()->get();
        return view('frontend.blog.blog_details',compact('blogpost','blogcategory'));
    }//end method

      public function HomeBlogCategoryPost($category_id){
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::where('category_id',$category_id)->orderBy('id','DESC')->get();
        return view('frontend.blog.blog_cat_list',compact('blogpost','blogcategory'));
    }//end method
}
