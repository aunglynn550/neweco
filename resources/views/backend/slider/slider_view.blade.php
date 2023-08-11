@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Slider List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Slider Image</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                @foreach($sliders as $item)
							<tr>
								<td><img src="{{ asset($item->slider_image)  }}" style="width:70px;" height="40px" alt="" srcset=""></td>
								<td>
                                @if($item->title == NULL )
                                    <span class="badge badge-pill badge-danger">No Tilte</span>
									@else
									{{ $item->title }}
                                    @endif
                                    </td>
								<td>{{ $item->description }}</td>
                                <td>
                                    @if($item->status ==1 )
                                    <span class="badge badge-pill badge-success">Active</span>
									@else
									<span class="badge badge-pill badge-danger">Inactive</span>
                                    @endif
                                </td>
								<td>
                            <a href="{{ route('slider.edit',$item->id) }}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>								
							<a href="{{ route('slider.delete',$item->id) }}" title="Delete Data" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>  
                            @if($item->status == 1)
									<a href="{{ route('slider.inactive',$item->id) }}" title="Inactive Now" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>										
							@else
									<a href="{{ route('slider.active',$item->id) }}" title="Active Now" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>	
							@endif
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
     <h3 class="box-title">Add Slider</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
            @csrf
           

           
                      <div class="form-group">
                     
                            <h5>Slider Title<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="title" class="form-control" >                              
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Slider Description<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="description" class="form-control" >                                
                            </div>
                            
                      </div><!--End-Form-Group-->
                  

                  
                      <div class="form-group">
                     
                            <h5>Slider Image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="slider_image" class="form-control">
                                @error('slider_image')
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