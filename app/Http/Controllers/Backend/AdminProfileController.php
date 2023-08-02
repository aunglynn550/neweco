<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminProfileController extends Controller
{
    //
    public function AdminProfile(){
        $adminData = Admin::all()->first();
        
        return view('admin.admin_profile_view',compact('adminData'));
    }//End Method

    public function AdminProfileEdit(){
        $editData = Admin::all()->first();
        
        return view('admin.admin_profile_edit',compact('editData'));
    }//End Method

    public function AdminProfileStore(Request $request){

        $data = Admin::all()->first();

        if($request->file('profile_photo_path'))
        {
         $file = $request->file('profile_photo_path');
         @unlink(public_path('upload/admin_images/'.$data->image));
          $filename = date('YmdHi').$file->getClientOriginalName();
          $request->profile_photo_path->move(public_path('upload/admin_images'),$filename);
 
         $data['profile_photo_path'] = $filename;
        }
 
        $data->save();
 
        $notification = array(
         'alert-type' => 'success',
         'message' => 'Admin Profile Updated Successfully!',
       );
   
      return redirect()->route('admin.profile')->with($notification);
    }//ENd Method

    public function AdminChangePassword(){
        return view("admin.admin_change_password");
      }//End Method

      public function AdminUpdateChangePassword(Request $request){

        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
          ]);
  
          $hashPassword = Admin::all()->first()->password;
          if(Hash::check($request->oldpassword,$hashPassword))
          {
            $admin = Admin::all()->first();
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
          }else{
            return redirect()->back();
          }
       
      }
}
