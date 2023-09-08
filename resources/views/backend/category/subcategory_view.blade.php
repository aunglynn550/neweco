@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Sub Category List <span class="badge badge-pill badge-danger">{{ count($subcategory) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category</th>
								<th>SubCategory English</th>
								<th>SubCategory Hindi</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                @foreach($subcategory as $item)
							<tr>
								<td>{{ $item['category']['category_name_en'] }}</td>
								<td>{{ $item->subcategory_name_en }}</td>
								<td>{{ $item->subcategory_name_hin }}</td>
								
								<td width="30%">
                                    <a href="{{ route('subcategory.edit',$item->id) }}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>								
								    <a href="{{ route('subcategory.delete',$item->id) }}" title="Delete Data" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
     <h3 class="box-title">Add Sub Category</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('subcategory.store') }}" >
            @csrf
           
            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" required="" class="form-control" aria-invalid="false">
										<option value="" selected="" disabled="">Select Category</option>
                                        @foreach($category as $cate)
										<option value="{{ $cate->id }}">{{ $cate->category_name_en }}</option>
										@endforeach
									</select>
                                    @error('category_id')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
								<div class="help-block"></div></div>
					</div><!--End-Form-Group-->
           
                      <div class="form-group">
                     
                            <h5>Sub Category English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="subcategory_name_en" class="form-control" > 
                                @error('subcategory_name_en')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Sub Category Hindi<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="subcategory_name_hin" class="form-control" > 
                                @error('subcategory_name_hin')
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