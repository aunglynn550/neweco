@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Coupon List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>						
								<th>Coupon Name</th>
								<th>Coupon Discount</th>
								<th>Vaildity</th>
								<th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                @foreach($coupons as $item)
							<tr>								
								<td>{{ $item->coupon_name }}</td>
								<td>{{ $item->coupon_discount }} %</td>
								<td>{{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}</td>
                                <td>
									@if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d') )
									<span class="badge badge-pill badge-success">Valid</span>
									@else
									<span class="badge badge-pill badge-danger">Invaild</span>
									@endif
                				</td>	

								
								
								<td width="25%">
                                    <a href="{{ route('coupon.edit',$item->id) }}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>								
								  <a href="{{ route('coupon.delete',$item->id) }}" title="Delete Data" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
     <h3 class="box-title">Add Coupon</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('coupon.store') }}" >
            @csrf
           

           
                      <div class="form-group">
                     
                            <h5>Coupon Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="coupon_name" class="form-control" > 
                                @error('coupon_name')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Coupon Discount (%)<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="coupon_discount" class="form-control" > 
                                @error('coupon_discount')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                  

                  
                      <div class="form-group">
                     
                     <h5>Coupon Validity Date <span class="text-danger">*</span></h5>
                     <div class="controls">
                         <input  type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" > 
                         @error('coupon_validity')
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