<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;
class ShippingAreaController extends Controller
{
    //
    public function DivisionView(){
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('backend.ship.division.view_division',compact('divisions'));
    }
    
    public function DivisionStore(Request $request){
        $request->validate([
            'division_name_en' => 'required',           
        ]);

      
        ShipDivision::insert([
            'division_name_en' => strtoupper($request->division_name_en) ,           
            'division_name_chi' => strtoupper($request->division_name_chi) ,           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Division Inserted Successfully!',
          );
      
         return redirect()->back()->with($notification);
    }//end method

    public function DivisionEdit($id){
        $division = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division',compact('division'));

    }//end method

    public function DivisionUpdate(Request $request,$id){
        $request->validate([
            'division_name_en' => 'required',           
        ]);

      
        ShipDivision::findOrFail($id)->update([
            'division_name_en' => strtoupper($request->division_name_en) ,           
            'division_name_chi' => strtoupper($request->division_name_chi) ,           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'alert-type' => 'info',
            'message' => 'Division Updated Successfully!',
          );
      
         return redirect()->route('manage-division')->with($notification);
    }//end method

    public function DivisionDelete($id){
        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'alert-type' => 'info',
            'message' => 'Division Deleted Successfully!',
          );
      
         return redirect()->back()->with($notification);

    }//end method

    ////////////// Start Ship District////////////////////////

    public function DistrictView(){
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        $districts = ShipDistrict::orderBy('id','DESC')->get();
        return view('backend.ship.district.view_district',compact('divisions','districts'));
    }//end method

    public function DistrictStore(Request $request){
        $request->validate([
            'division_id' => 'required',           
            'district_name_en' => 'required',           
        ]);

      
        ShipDistrict::insert([
            'division_id' => $request->division_id ,           
            'district_name_en' => strtoupper($request->district_name_en) ,           
            'district_name_chi' => strtoupper($request->district_name_chi) ,           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'District Inserted Successfully!',
          );
      
         return redirect()->back()->with($notification);
    }//end method

    public function DistrictEdit($id){
        $district = ShipDistrict::findOrFail($id);
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('backend.ship.district.edit_district',compact('divisions','district'));

    }//end method

    public function DistrictUpdate(Request $request,$id){
        $request->validate([
            'division_id' => 'required',           
            'district_name_en' => 'required',           
        ]);

      
        ShipDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id ,           
            'district_name_en' => strtoupper($request->district_name_en) ,           
            'district_name_chi' => strtoupper($request->district_name_chi) ,           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'alert-type' => 'info',
            'message' => 'District Updated Successfully!',
          );
      
         return redirect()->route('manage-district')->with($notification);
    }//end method

    public function DistrictDelete($id){
        ShipDistrict::findOrFail($id)->delete();
        $notification = array(
            'alert-type' => 'info',
            'message' => 'District Deleted Successfully!',
          );
      
         return redirect()->back()->with($notification);

    }//end method

    ////////////// End Ship District////////////////////////


    ////////////// Start Ship State////////////////////////
    
    public function StateView(){
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        $districts = ShipDistrict::orderBy('id','DESC')->get();
        $states = ShipState::orderBy('id','DESC')->get();
        return view('backend.ship.state.view_state',compact('divisions','districts','states'));
    }//end method


    public function StateStore(Request $request){
        $request->validate([
            'division_id' => 'required',           
            'district_id' => 'required',           
            'state_name_en' => 'required',           
        ]);

      
        ShipState::insert([
            'division_id' => $request->division_id ,           
            'district_id' => $request->district_id ,           
            'state_name_en' => strtoupper($request->state_name_en) ,           
            'state_name_chi' => strtoupper($request->state_name_chi) ,           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'State Inserted Successfully!',
          );
      
         return redirect()->back()->with($notification);
        }//end method

          public function StateEdit($id){
            $divisions = ShipDivision::orderBy('id','DESC')->get();
            $districts = ShipDistrict::orderBy('id','DESC')->get();
            $state =  ShipState::findOrFail($id);
        return view('backend.ship.state.edit_state',compact('divisions','districts','state'));

    }//end method

    public function StateUpdate(Request $request,$id){
        $request->validate([
            'division_id' => 'required',           
            'district_id' => 'required',           
            'state_name_en' => 'required',         
        ]);

      
        ShipState::findOrFail($id)->update([
            'division_id' => $request->division_id ,           
            'district_id' => $request->district_id ,           
            'state_name_en' => strtoupper($request->state_name_en) ,           
            'state_name_chi' => strtoupper($request->state_name_chi) ,           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'alert-type' => 'info',
            'message' => 'State Updated Successfully!',
          );
      
         return redirect()->route('manage-state')->with($notification);
    }//end method

    public function StateDelete($id){
        ShipState::findOrFail($id)->delete();
        $notification = array(
            'alert-type' => 'info',
            'message' => 'State Deleted Successfully!',
          );
      
         return redirect()->back()->with($notification);

    }//end method



    public function GetDistrict($division_id){
        $districts =  ShipDistrict::where('division_id',$division_id)->orderBy('district_name_en','ASC')->get();

        return json_encode($districts);

    }
    ////////////// End Ship State////////////////////////
}
