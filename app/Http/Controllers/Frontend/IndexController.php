<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Slider;
use App\Models\Product;
class IndexController extends Controller
{
    //
    public function index(){
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();

        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals',1)->orderBy('id','DESC')->limit(6)->get();
        $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(6)->get();
        return view('frontend.index',compact('categories','sliders','products','featured','hot_deals','special_offer','special_deals'));
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
        $product = Product::findOrFail($id);
        $multiImg = MultiImg::where('product_id',$id)->get();
        return view('frontend.product.product_details',compact('product','multiImg'));
    }
}
