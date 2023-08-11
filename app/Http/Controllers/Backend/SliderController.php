<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use Image;
class SliderController extends Controller
{
    //
    public function SliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view',compact('sliders'));
    }//end method

    public function SliderStore(Request $request){
        $request->validate([         
            'slider_image' => 'required',
        ],[
            'slider_image.required' => 'Select One Image',            
        ]);

        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,           
            'slider_image' => $save_url,
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Slider Inserted Successfully!',
          );
      
         return redirect()->back()->with($notification);
    }//ENd method


    public function SliderEdit($id){

        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('sliders'));
    }//end method

    public function SliderUpdate(Request $request){

        $slider_id = $request->id;
        $old_image = $request->old_image;

       

        if($request->file('slider_image')){

             @unlink($old_image);
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;
    
            Slider::where('id',$slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,               
                'slider_image' => $save_url,
            ]);
    
            $notification = array(
                'alert-type' => 'success',
                'message' => 'Slider Updated Successfully!',
              );
          
             return redirect()->route('manage-slider')->with($notification);

        }else{

            Slider::where('id',$slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,              
               
            ]);         
    
            $notification = array(
                'alert-type' => 'success',
                'message' => 'Slider Updated Without IMage Successfully!',
              );
          
            return redirect()->route('manage-slider')->with($notification);


        }//end else

     
    }//End Method

    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_image;
        unlink($img);
        Slider::findOrFail($id)->delete();

        $notification = array(
            'alert-type' => 'info',
            'message' => 'Slider Deleted Successfully!',
          );
      
        return redirect()->back()->with($notification);
    }//End Method


    public function SliderInactive($id){
        Slider::where('id',$id)->update(['status'=>0]);
        $notification = array(
            'alert-type' => 'info',
            'message' => 'Slider Inactive Successfully!',
          );
      
         return redirect()->back()->with($notification);

    }//End method

    public function SliderActive($id){
        Slider::where('id',$id)->update(['status'=>1]);
        $notification = array(
            'alert-type' => 'info',
            'message' => 'Slider Active Successfully!',
          );
      
         return redirect()->back()->with($notification);
        
    }//End method

}
