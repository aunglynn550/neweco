@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">State List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>						
								<th>Division Name</th>								
								<th>District Name</th>								
								<th>State Name</th>								
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>

                @foreach($states as $item)
							<tr>								
																							
								<td>{{ $item['division']['division_name'] }}</td>															
								<td>{{ $item->district->district_name}}</td>															
								<td>{{ $item->state_name }}</td>															
								
								<td width="40%">
                                    <a href="{{ route('state.edit',$item->id) }}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>								
								    <a href="{{ route('state.delete',$item->id) }}" title="Delete Data" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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


       <form method="post" action="{{ route('state.store') }}" >
            @csrf   
           
                    <div class="form-group">
								<h5>Division Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="division_id" required="" class="form-control" aria-invalid="false">
										<option value="" disabled="" selected="">Select Division</option>
                                        @foreach($divisions as $division)
										<option value="{{ $division->id }}">{{ $division->division_name }}</option>
										@endforeach
									</select>
                                    @error('division_id')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
								<div class="help-block"></div></div>
					</div><!--End-Form-Group-->


                    <div class="form-group">
								<h5>District Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="district_id" required="" class="form-control" aria-invalid="false">
										<option value="" disabled="" selected="">Select District</option>
                                    
									</select>
                                    @error('district_id')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
								<div class="help-block"></div></div>
					</div><!--End-Form-Group-->

           
                      <div class="form-group">
                     
                            <h5>State Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="state_name" class="form-control" > 
                                @error('state_name')
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



       
<script text="text/javascript"> 
    $(document).ready(function(){

        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();

            if(division_id){
                $.ajax({
                    url: "{{ url('shipping/division/district/ajax') }}/"+division_id,
                    type : "GET",
                    dataType: "json",
                    success:function(data){
                        $('select[name="district_id"]').html('');
                        var d=$('select[name="district_id"]').empty();
                        $.each(data, function(key,value){
                            $('select[name="district_id"]').append('<option value="'+value.id+'">'
                            +value.district_name+'</option>');

                        });
                    }
                });
            }else{
                alert('danger');
            }
        });



    });
</script>
@endsection