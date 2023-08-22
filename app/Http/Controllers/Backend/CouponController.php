<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    //
    public function CouponView(){
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('backend.coupon.view_coupon',compact('coupons'));
    }//End MEthod

    public function CouponStore(Request $request){
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

      
        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name) ,
            'coupon_discount' => $request->coupon_discount,           
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Coupon Inserted Successfully!',
          );
      
         return redirect()->back()->with($notification);
    }// End Method

    public function CouponEdit($id){
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit_coupon',compact('coupon'));
       
    }//End method

    public function CouponUpdate(Request $request, $id){
        $coupon = Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name) ,
            'coupon_discount' => $request->coupon_discount,           
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'alert-type' => 'info',
            'message' => 'Coupon Updated Successfully!',
          );
      
         return redirect()->route('manage-coupon')->with($notification);

    }//End Method

    public function CouponDelete($id){
        Coupon::findOrFail($id)->delete();
        $notification = array(
            'alert-type' => 'info',
            'message' => 'Coupon Deleted Successfully!',
          );
      
         return redirect()->back()->with($notification);

    }
}