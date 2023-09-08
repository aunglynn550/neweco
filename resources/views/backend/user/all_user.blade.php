@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Total User <span class="badge badge-pill badge-danger">{{ count($users) }}</span> </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name </th>
								<th>Email</th>
								<th>Phone</th>
								<th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($users as $user)
							<tr>
								<td><img  src="{{ !(empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path) : url('upload/admin_images/no_image.jpg') }}"
                                 style="width:50px;" height="50px;" alt="" srcset=""></td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->phone }}</td>
								@if($user->UserOnline())
								<td> <span class="badge badge-pill badge-success">Active Now</span></td>
								@else
								<td> <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span></td>
								@endif
								
								<td>
                                    <a href="" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>								
								    <a href="" title="Delete Data" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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