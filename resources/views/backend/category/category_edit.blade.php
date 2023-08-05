@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

            
<div class="col-12">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add Category</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('category.update',$category->id) }}" >
            @csrf
           
            <input type="hidden" name="id" value="{{ $category->id }}">
           
                      <div class="form-group">
                     
                            <h5>Category English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="category_name_en" class="form-control" value="{{ $category->category_name_en }}"> 
                                @error('category_name_en')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Category Hindi<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="category_name_hin" class="form-control" value="{{ $category->category_name_hin }}"> 
                                @error('category_name_hin')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                  

                  
                      <div class="form-group">
                     
                     <h5>Category Icon <span class="text-danger">*</span></h5>
                     <div class="controls">
                         <input  type="text" name="category_icon" class="form-control" value="{{ $category->category_icon }}"> 
                         @error('category_icon')
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