@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

            <!-- Edit District Page -->

            
<div class="col-8">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Edit District</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('district.update',$district->id) }}" >
            @csrf   
           
                    <div class="form-group">
                        <h5>Division Select <span class="text-danger">*</span></h5>
                        <div class="controls">

                          <select name="division_id" required="" class="form-control" aria-invalid="false">
                              <option value="" disabled="" selected="">Select Division</option>
                            @foreach($divisions as $division)
                              <option value="{{ $division->id }}" {{ $division->id == $district->division_id ? 'selected':'' }}>{{ $division->division_name_en }}</option>
                            @endforeach
                          </select>

                          @error('division_id')
                              <span class="btn btn-danger">{{ $message }}</span>
                          @enderror
                        <div class="help-block"></div>

                      </div>
					          </div><!--End-Form-Group-->

           
                      <div class="form-group">
                     
                            <h5>District Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="district_name_en" class="form-control" value="{{ $district->district_name_en }}"> 
                                @error('district_name_en')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                      
                      <div class="form-group">
                     
                            <h5>District Name Chinese<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="district_name_chi" class="form-control" value="{{ $district->district_name_chi }}"> 
                                @error('district_name_chi')
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

</div> <!-- end col-8 -->


              </div> <!-- end row -->
   
   </div> <!-- end main conent -->
@endsection