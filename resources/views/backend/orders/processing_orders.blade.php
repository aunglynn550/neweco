@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Processing Orders List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>						
								<th>Date </th>
								<th>Invoice</th>
								<th>Amount</th>
								<th>Payment</th>
								<th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                @foreach($orders as $item)
							<tr>								
								<td>{{ $item->order_date }}</td>
								<td>{{ $item->invoice_no }}</td>
								<td>${{ $item->amount}}</td>
								<td>{{ $item->payment_method }}</td>								
                                <td>
									
									<span class="badge badge-pill badge-primary">{{ $item->status }}</span>
									
                				</td>	

								
								
								<td width="25%">
                                    <a href="{{ route('pending.order.details',$item->id) }}" title="Edit Data" class="btn btn-info"><i class="fa fa-eye"></i></a>								
								    <a target="" href="{{ route('invoice.download',$item->id) }}" title="Invoice Download"  class="btn btn-danger"><i class="fa fa-download"></i></a>
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

          


              </div> <!-- end row -->
   
   </div> <!-- end main conent -->
@endsection