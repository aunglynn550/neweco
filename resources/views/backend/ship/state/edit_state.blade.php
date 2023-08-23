@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

    <!-- Edit State Page -->

            
<div class="col-8">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Edit State</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('state.update',$state->id) }}" >
            @csrf   
           
                    <div class="form-group">
								<h5>Division Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="division_id" required="" class="form-control" aria-invalid="false">
										<option value="" disabled="" selected="">Select Division</option>
                                        @foreach($divisions as $division)
										<option value="{{ $division->id }}" {{ $division->id == $state->division_id ? 'selected': '' }}>{{ $division->division_name }}</option>
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
                                        @foreach($districts as $district)
										<option value="{{ $district->id }}" {{ $district->id == $state->district_id ? 'selected': '' }}>{{ $district->district_name }}</option>
										@endforeach
									</select>
                                    @error('district_id')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
								<div class="help-block"></div></div>
					</div><!--End-Form-Group-->

           
                      <div class="form-group">
                     
                            <h5>State Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="state_name" class="form-control" value="{{ $state->state_name }}"> 
                                @error('state_name')
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