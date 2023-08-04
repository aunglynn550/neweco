@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Brand List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand En</th>
								<th>Brand Hin</th>
								<th>Image</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                @foreach($brands as $item)
							<tr>
								<td>{{ $item->brand_name_en }}</td>
								<td>{{ $item->brand_name_hin }}</td>
								<td><img src="{{ asset($item->brand_image)  }}" style="width:70px;" height="40px" alt="" srcset=""></td>
								<td><a href="" class="btn btn-info">Edit</a></td>								
								<td><a href="" class="btn btn-danger">Delete</a></td>								
							</tr>
						    @endforeach
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

</div> <!-- end col-8 -->

            <!-- Add Brand Page -->

            
<div class="col-4">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add Brand</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
            @csrf
             <div class="row">
               <div class="col-12">
                

           
                      <div class="form-group">
                     
                            <h5>Brnad Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="brand_name_en" class="form-control" > 
                                @error('brand_name_en')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Brand Name Hindi<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="brand_name_hin" class="form-control" > 
                                @error('brand_name_hin')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                  

                  
                      <div class="form-group">
                     
                            <h5>Brand Image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image" class="form-control">
                                @error('brand_image')
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