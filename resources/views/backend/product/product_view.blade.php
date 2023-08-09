@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Product List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Product Name English</th>
								<th>Product Name Hindi</th>
								<th>Quantity</th>								
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                @foreach($products as $item)
							<tr>
								<td> <img src="{{ asset($item->product_thambnail) }}" style="width:60px; height:50px;" alt=""> </td>
								<td>{{ $item->product_name_en }}</td>
								<td>{{ $item->product_name_hin }}</td>
								<td>{{ $item->product_qty }}</td>
								
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

</div> <!-- end col-12 -->

        


              </div> <!-- end row -->
   
   </div> <!-- end main conent -->
@endsection