@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Sub->SubCategory List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category</th>
								<th>SubCategory Name</th>
								<th>Sub-SubCategory English</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody> 
                @foreach($subsubcategory as $item)
							<tr>
								<td>{{ $item['category']['category_name_en'] }}</td>
								<td>{{ $item['subcategory']['subcategory_name_en'] }}</td>
								<td>{{ $item->subsubcategory_name_en }}</td>
								
								<td width="30%">
                                    <a href="{{ route('subsubcategory.edit',$item->id) }}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>								
								    <a href="{{ route('subsubcategory.delete',$item->id) }}" title="Delete Data" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
     <h3 class="box-title">Add Sub-SubCategory</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('subsubcategory.store') }}" >
            @csrf
           
            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" required="" class="form-control">
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
								<h5> SubCategory Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" required="" class="form-control" aria-invalid="false">
										<option value="" disabled="">Select SubCategory</option>
                                      
									</select>
                                    @error('subcategory_id')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
								<div class="help-block"></div></div>
					</div><!--End-Form-Group-->

                      <div class="form-group">
                     
                            <h5>Sub-SubCategory English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="subsubcategory_name_en" class="form-control" > 
                                @error('subsubcategory_name_en')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Sub-SubCategory Hindi<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="subsubcategory_name_hin" class="form-control" > 
                                @error('subsubcategory_name_hin')
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

        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();

            if(category_id){
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                    type : "GET",
                    dataType: "json",
                    success:function(data){
                        var d=$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key,value){
                            $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'
                            +value.subcategory_name_en+'</option>');

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