@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="content">
    <div class="row">

  

            <!-- Add Coupon Page -->

            
<div class="col-8">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Edit Coupon</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


       <form method="post" action="{{ route('coupon.update',$coupon->id) }}" >
            @csrf
           

           
                      <div class="form-group">
                     
                            <h5>Coupon Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="coupon_name" class="form-control" value="{{ $coupon-> coupon_name  }}"> 
                                @error('coupon_name')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                   

                  
                      <div class="form-group">
                     
                            <h5>Coupon Discount (%)<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input  type="text" name="coupon_discount" class="form-control"  value="{{ $coupon->coupon_discount  }}"> 
                                @error('coupon_discount')
                                <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                      </div><!--End-Form-Group-->
                  

                  
                      <div class="form-group">
                     
                     <h5>Coupon Validity Date <span class="text-danger">*</span></h5>
                     <div class="controls">
                         <input  type="date" name="coupon_validity" class="form-control"  value="{{ $coupon->coupon_validity }}" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" > 
                         @error('coupon_validity')
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