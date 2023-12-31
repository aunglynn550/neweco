<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Slider;
use App\Models\SiteSetting;
use App\Models\Product;
use App\Models\Blog\BlogPost;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
class IndexController extends Controller
{
    //
    public function index(){
        $blogpost = BlogPost::latest()->get();

        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();

        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(6)->get();
        $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(6)->get();
        $setting = SiteSetting::find(1);
        // $skip_category_0 = Category::skip(0)->first();
        // $skip_product_0= Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        // $skip_category_1 = Category::skip(1)->first();
        // $skip_product_1= Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();


        // $skip_brand_1 = Brand::skip(1)->first();
        // $skip_brand_product_1= Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();

        // return view('frontend.index',compact('categories','sliders','products','featured',
        //             'hot_deals','special_offer','special_deals','skip_category_0','skip_product_0',
        //             'skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1','blogpost'));


        return view('frontend.index',compact('categories','sliders','products','featured',
        'hot_deals','special_offer','special_deals','blogpost','setting'));
    }//End Method
    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }//End method

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }//ENd method

    public function UserProfileStore(Request $request){

        $data = user::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
       

        if($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path'); 
            @unlink(public_path('upload/admin_images/'.$data->image));       
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
 
            $data['profile_photo_path'] = $filename;
        }
 
        $data->save();
 
        $notification = array(
         'alert-type' => 'success',
         'message' => 'User Profile Updated Successfully!',
       );
   
      return redirect()->route('dashboard')->with($notification);
    }//End Method

    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }//End Method

    public function UserPasswordUpdate(Request $request){
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
          ]);
  
          $hashPassword = Auth::user()->password;
          if(Hash::check($request->oldpassword,$hashPassword))
          {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
          }else{
            return redirect()->back();
          }
    }//End method

    public function ProductDetails($id,$slug){

        $setting = SiteSetting::find(1);
        $product = Product::findOrFail($id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);

        
        $color_chi = $product->product_color_chi;
        $product_color_chi = explode(',',$color_chi);

        
        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);
        
        $size_chi = $product->product_size_chi;
        $product_size_chi = explode(',',$size_chi);
        
        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

        $multiImg = MultiImg::where('product_id',$id)->get();
        return view('frontend.product.product_details',compact('product','multiImg',
                    'product_color_en','product_color_chi','product_size_en','product_size_chi',
                    'relatedProduct','setting'));

    }//end method

    public function TagWiseProduct($tag){
        $setting = SiteSetting::find(1);
        $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_hin',$tag)->orderBy('id','DESC')->paginate(1);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.tags.tags_view',compact('products','categories','setting'));
    }//ENd method

    public function SubCatWiseProduct($subcat_id,$slug){
        $setting = SiteSetting::find(1);
        $breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();
        $products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.subcategory_view',compact('products','categories','setting','breadsubcat'));
    }//End method

    public function SubSubCatWiseProduct($subsubcat_id,$slug){
        $setting = SiteSetting::find(1);
        $breadsubsubcat = SubSubCategory::with(['category','subcategory'])->where('id',$subsubcat_id)->get();
        $products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.subsubcategory_view',compact('products','categories','setting','breadsubsubcat'));
    }//end menthod

    //Product View With Ajax
    public function ProductViewAjax($id){
        $product = Product::with('category','brand')->findOrFail($id);

        $color = $product->product_color_en;
        $product_color = explode(',',$color);

        $size = $product->product_size_en;
        $product_size = explode(',',$size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }//end method


    // Product Seach 
	public function ProductSearch(Request $request){

        $request->validate([
            "search" => "required"
        ]);
		$item = $request->search;
		$setting = SiteSetting::find(1);
        $categories = Category::orderBy('category_name_en','ASC')->get();
		$products = Product::where('product_name_en','LIKE',"%$item%")->get();
		return view('frontend.product.search',compact('products','categories','setting'));

	}//end method



    ///// Advance Search Options 
	public function SearchProduct(Request $request){
		$request->validate(["search" => "required"]);

		$item = $request->search;		 

		$products = Product::where('product_name_en','LIKE',"%$item%")->select('product_name_en','product_thambnail','selling_price','id','product_slug_en')->limit(5)->get();
		return view('frontend.product.search_product',compact('products')); 
	} // end method 



}
