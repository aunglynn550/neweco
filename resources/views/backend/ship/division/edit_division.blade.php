@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">


            <!-- Edit Division Page -->

            
<div class="col-8">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Edit Division</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('division.update',$division->id) }}" >
            @csrf
           

           
                      <div class="form-group">
                     
                            <h5>Division Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="division_name" class="form-control" value="{{ $division->division_name }}"> 
                                @error('division_name')
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

</div> <!-- end col-4 -->


              </div> <!-- end row -->
   
   </div> <!-- end main conent -->
@endsection