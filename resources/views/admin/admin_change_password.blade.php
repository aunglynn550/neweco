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
     
           <form method="post" action="{{ route('update.change.password') }}" enctype="multipart/form-data">
            @csrf
             <div class="row">
               <div class="col-12">
                

               <div class="row">

                    <div class="col-6">
                      <div class="form-group">
                     
                            <h5>Current Password<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input id="current_password" type="password" name="oldpassword" class="form-control" required="" > 
                            </div>
                            
                      </div><!--End-Form-Group-->
                    </div><!-- End col-6-->

                    <div class="col-6">
                      <div class="form-group">
                     
                            <h5>New Password<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input id="password" type="password" name="password" class="form-control" required="" > 
                            </div>
                            
                      </div><!--End-Form-Group-->
                    </div><!-- End col-6-->

                    <div class="col-6">
                      <div class="form-group">
                     
                            <h5>Conformation Password<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required="" > 
                            </div>
                            
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

@endsection