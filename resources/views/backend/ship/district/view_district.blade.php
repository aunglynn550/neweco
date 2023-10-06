@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">District List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>						
								<th>Division Name</th>								
								<th>District Name</th>								
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                @foreach($districts as $item)
							<tr>								
								<td>{{ $item['division']['division_name_en'] }}</td>															
								<td>{{ $item->district_name_en }}</td>															
								
								<td width="40%">
                                    <a href="{{ route('district.edit',$item->id) }}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>								
								    <a href="{{ route('district.delete',$item->id) }}" title="Delete Data" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>								
							</tr>
						    @endforeach
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

</div> <!-- end col-8 -->

            <!-- Add District Page -->

            
<div class="col-4">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add District</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('district.store') }}" >
            @csrf   
           
                    <div class="form-group">
								<h5>Division Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="division_id" required="" class="form-control" aria-invalid="false">
										<option value="" disabled="" selected="">Select Division</option>
                                        @foreach($divisions as $division)
										<option value="{{ $division->id }}">{{ $division->division_name_en }}</option>
										@endforeach
									</select>
                                    @error('division_id')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
								<div class="help-block"></div></div>
					</div><!--End-Form-Group-->

           
                    <div class="form-group">                     
                            <h5>District Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="district_name_en" class="form-control" > 
                                @error('district_name_en')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>                            
                    </div><!--End-Form-Group-->
					
					<div class="form-group">                     
                            <h5>District Name Chinese<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="district_name_chi" class="form-control" > 
                                @error('district_name_chi')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>                            
                    </div><!--End-Form-Group-->
                                                                                                                  

                        <div class="text-xs-right">
						      <input type="submit" class="btn btn-rounded btn-info mb-5" value="Add New">
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