@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
            <!-- Edit Blog Category Page -->
            
                <div class="col-12">

                <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Eidt Blog Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">


                    <form method="post" action="{{ route('blog.category.update') }}" >
                            @csrf

                                <input type="hidden" name="id" value="{{ $blogcategory->id }}">
                        
                                    <div class="form-group">
                                    
                                            <h5>Blog Category English<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input  type="text" name="blog_category_name_en" class="form-control" value="{{ $blogcategory->blog_category_name_en }}"> 
                                                @error('blog_category_name_en')
                                                <span class="btn btn-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                    </div><!--End-Form-Group-->
                                

                                
                                    <div class="form-group">
                                    
                                            <h5>Blog Category Hindi<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input  type="text" name="blog_category_name_hin" class="form-control" value="{{ $blogcategory->blog_category_name_hin }}"> 
                                                @error('blog_category_name_hin')
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