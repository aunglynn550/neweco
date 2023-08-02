@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
  </script>


 <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

        <section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Manage Admin Profile</h4>
    
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     
           <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
            @csrf
             <div class="row">
               <div class="col-12">
                

               <div class="row">

                    <div class="col-6">
                      <div class="form-group">
                     
                            <h5>Admin Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name" class="form-control" value="{{ $editData->name }}" required="" > </div>
                            
                       
                      </div><!--End-Form-Group-->
                    </div><!-- End col-6-->

                    <div class="col-6">
                      <div class="form-group">
                 
                      <h5>Admin Email<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="email" class="form-control" value="{{ $editData->email }}" required="" >
                             </div><!-- End-controls-->
                                                 
                      </div><!--End-Form-Group-->
                    </div><!-- End col-6-->

                 
                    

                <div class="col-6">
                  <div class="form-group">
                  
                    <h5>Profile Image<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="file" name="profile_photo_path" class="form-control" id="image" > 
                    </div><!-- End-controls-->
                  </div><!--End-Form-Group-->

                  </div><!-- End col-6-->
                  
                <div class="col-6">
                  <div class="form-group">

                    <div class="controls">
                        <img id="showImage" class="" 
                        src="{{ !(empty($editData->image))? url('upload/admin_images/'.$editData->image) : url('upload/admin_images/no_image.jpg') }}" 
                        alt="Avatar" style="width:100px; width:100px; border:1px solid #000000;">
                    </div><!-- End-controls-->
                  
                  </div><!--End-Form-Group-->

                </div><!-- End col-6-->


                    </div> <!--End row -->


               <div class="text-xs-right">
						      <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
						  </div>
            

                 
                
                   
            
					</form>
               </div><!--col-md-12-->
             </div><!--row-->
             
				
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>


	  
	  </div>
  </div>

<script type="text/javascript">
  $(document).ready(function() {

    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });

  });
</script>

@endsection