@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">
<!-- Edit Brand Page -->
<div class="col-12">

    <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Edit Brand</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('brand.update',$brand->id) }}" enctype="multipart/form-data">
            @csrf           
            
                    <input type="hidden" name="id" value="{{ $brand->id }}">
                    <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
           
                      <div class="form-group">
                     
                            <h5>Brnad Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="brand_name_en" value="{{ $brand->brand_name_en }}" class="form-control" > 
                              
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Brand Name Hindi<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="brand_name_hin" value="{{ $brand->brand_name_hin }}" class="form-control" > 
                             
                            </div>
                            
                      </div><!--End-Form-Group-->
                  

                  
                      <div class="form-group">
                     
                            <h5>Brand Image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image" class="form-control">
                                @error('brand_image')
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