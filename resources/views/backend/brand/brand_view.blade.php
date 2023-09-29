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
								<th>Brand English</th>
								<th>Brand Chinese</th>
								<th>Image</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                @foreach($brands as $item)
							<tr>
								<td>{{ $item->brand_name_en }}</td>
								<td>{{ $item->brand_name_chi }}</td>
								<td><img src="{{ asset($item->brand_image)  }}" style="width:70px;" height="40px" alt="" srcset=""></td>
								<td>
                  <a href="{{ route('brand.edit',$item->id) }}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>								
								  <a href="{{ route('brand.delete',$item->id) }}" title="Delete Data" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                     
                            <h5>Brand Name Chinese<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="brand_name_chi" class="form-control" > 
                                @error('brand_name_chi')
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
						      <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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