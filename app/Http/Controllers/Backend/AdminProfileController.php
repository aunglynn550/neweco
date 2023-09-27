<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\User;

use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminProfileController extends Controller
{
    //
    public function AdminProfile(){

        $id = Auth::user()->id;
        $adminData = Admin::find($id);
        
        return view('admin.admin_profile_view',compact('adminData'));
    }//End Method

    public function AdminProfileEdit(){
        $id = Auth::user()->id;
        $editData = Admin::find($id);
        
        return view('admin.admin_profile_edit',compact('editData'));
    }//End Method

    public function AdminProfileStore(Request $request){

        
        $data = Admin::find(Auth::id());

        if($request->file('profile_photo_path'))
        {
         $file = $request->file('profile_photo_path');
         @unlink(public_path('upload/admin_images/'.$data->image));
          $filename = date('YmdHi').$file->getClientOriginalName();
          $request->profile_photo_path->move(public_path('upload/admin_images'),$filename);
 
         $data['profile_photo_path'] = 'upload/admin_images/'.$filename;
        }
        $data['name']=$request->name;
        $data['email']=$request->email;
 
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
  
          $hashPassword = Admin::user()->password;
          if(Hash::check($request->oldpassword,$hashPassword))
          {
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
          }else{
            return redirect()->back();
          }
       
      }//end method

      public function AllUsers(){
      $users = User::latest()->get();
      return view('backend.user.all_user',compact('users'));
      }
}
