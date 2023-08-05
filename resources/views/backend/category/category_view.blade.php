@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Category List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category Icon</th>
								<th>Category Name English</th>
								<th>Category Name Hindi</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                @foreach($category as $item)
							<tr>
								<td> <span> <i class="{{ $item->category_icon }}"></i> </span> </td>
								<td>{{ $item->category_name_en }}</td>
								<td>{{ $item->category_name_hin }}</td>
								
								<td>
                  <a href="{{ route('category.edit',$item->id) }}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>								
								  <a href="{{ route('category.delete',$item->id) }}" title="Delete Data" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
     <h3 class="box-title">Add Category</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('category.store') }}" >
            @csrf
           

           
                      <div class="form-group">
                     
                            <h5>Category English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="category_name_en" class="form-control" > 
                                @error('category_name_en')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Category Hindi<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="category_name_hin" class="form-control" > 
                                @error('category_name_hin')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                  

                  
                      <div class="form-group">
                     
                     <h5>Category Icon <span class="text-danger">*</span></h5>
                     <div class="controls">
                         <input  type="text" name="category_icon" class="form-control" > 
                         @error('category_icon')
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