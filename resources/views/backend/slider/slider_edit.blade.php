@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">
<!-- Edit Brand Page -->
<div class="col-12">

    <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Edit Slider</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data">
            @csrf           
            
                    <input type="hidden" name="id" value="{{ $sliders->id }}">
                    <input type="hidden" name="old_image" value="{{ $sliders->slider_image }}">
           
                      <div class="form-group">
                     
                            <h5>Slider Tilte<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="title" value="{{ $sliders->title }}" class="form-control" > 
                              
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Slider Description<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="description" value="{{ $sliders->description }}" class="form-control" > 
                             
                            </div>
                            
                      </div><!--End-Form-Group-->
                  

                  
                      <div class="form-group">
                     
                            <h5>Slider Image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="slider_image" class="form-control">
                                @error('slider_image')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror 
                            </div>
                            
                      </div><!--End-Form-Group-->                                                                               


                                <div class="text-xs-right">
						            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
						        </div>
					
            

                 
                </form>

       
       </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

</div> <!-- end col-12 -->


              </div> <!-- end row -->
   
   </div> <!-- end main conent -->
@endsection