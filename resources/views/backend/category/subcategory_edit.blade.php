@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-12">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Edit Sub Category</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('subcategory.update') }}" >
            @csrf
           
            <input type="hidden" name="id" value="{{ $subcategory->id }}">
            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" required="" class="form-control" aria-invalid="false">
										<option value="" disabled="">Select Category</option>
                                        @foreach($category as $cate)
										<option value="{{ $cate->id }}" {{ $cate->id == $subcategory->category_id ? 'selected':'' }}>{{ $cate->category_name_en }}</option>
										@endforeach
									</select>
                                @error('category_id')
                                    <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
								<div class="help-block"></div></div>
					</div><!--End-Form-Group-->
           
                      <div class="form-group">
                     
                            <h5>Sub Category English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input value="{{ $subcategory->subcategory_name_en }}"  type="text" name="subcategory_name_en" class="form-control" > 
                                @error('subcategory_name_en')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Sub Category Hindi<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input value="{{ $subcategory->subcategory_name_hin }}"  type="text" name="subcategory_name_hin" class="form-control" > 
                                @error('subcategory_name_hin')
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