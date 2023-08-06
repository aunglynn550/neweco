@extends('admin.admin_master')

@section('admin')


<!-- Main Content -->
<div class="content">
    <div class="row">

  

   <!-- Add Sub Sub Category Page -->
            
<div class="col-12">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Edit Sub-SubCategory</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('subsubcategory.update') }}" >
            @csrf
            <input type="hidden" name="id" value="{{ $subsubcategories->id }}">
           
            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" required="" class="form-control">
										<option value="" selected="" disabled="">Select Category</option>
                                        @foreach($categories as $cate)
										<option value="{{ $cate->id }}" {{ $cate->id == $subsubcategories->category_id ? 'selected':'' }}>{{ $cate->category_name_en }}</option>
										@endforeach
									</select>
                                    @error('category_id')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
								<div class="help-block"></div></div>
					</div><!--End-Form-Group-->
           
                    <div class="form-group">
								<h5> SubCategory Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" required="" class="form-control" aria-invalid="false">
										<option value="" disabled="">Select SubCategory</option>
                                        @foreach($subcategories as $subcate)
										<option value="{{ $subcate->id }}" {{ $subcate->id == $subsubcategories->subcategory_id ? 'selected':'' }}>{{ $subcate->subcategory_name_en }}</option>
										@endforeach
									</select>
                                    @error('subcategory_id')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
								<div class="help-block"></div></div>
					</div><!--End-Form-Group-->

                      <div class="form-group">
                     
                            <h5>Sub-SubCategory English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategories->subsubcategory_name_en }}"> 
                                @error('subsubcategory_name_en')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Sub-SubCategory Hindi<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="subsubcategory_name_hin" class="form-control" value="{{ $subsubcategories->subsubcategory_name_hin }}"> 
                                @error('subsubcategory_name_hin')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->                                                                                                                                                                    


                        <div class="text-xs-right">
						      <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
						        </div>
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