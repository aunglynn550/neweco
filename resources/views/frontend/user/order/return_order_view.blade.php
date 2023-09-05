@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
           
         @include('frontend.common.user_sidebar')
         
         <div class="col-md-2">

         </div><!-- ./col-md-2 -->

         <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                   
                        <tr style="background: #e2e2e2;">
                            <td class="col-md-1">
                                <label for="">Date</label>
                            </td>
                            <td class="col-md-3">
                                <label for="">Total</label>
                            </td>
                            <td class="col-md-2">
                                <label for="">Invoice</label>
                            </td>
                            <td class="col-md-2">
                                <label for="">Payment</label>
                            </td>
                            <td class="col-md-2">
                                <label for="">Order</label>
                            </td>
                            <td class="col-md-2">
                                <label for="">Action</label>
                            </td>
                        </tr>
                     
                        @foreach($orders as $order)
                        <tr style="background: #e2e2e2;">
                            <td class="col-md-1">
                                <label for="">{{$order->order_date}}</label>
                            </td>
                            <td class="col-md-3">
                                <label for="">{{$order->amount}}</label>
                            </td>
                            <td class="col-md-2">
                                <label for="">{{$order->payment_method}}</label>
                            </td>
                            <td class="col-md-2">
                                <label for="">{{ $order->invoice_no }}</label>
                            </td>
                            <td class="col-md-2">
                                <label for="">
                                    <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{$order->status}}</span>

                                    <span class="badge badge-pill badge-warning" style="background: #C33C26;">Return Requested</span>
                                 </label>
                            </td>
                            <td class="col-md-2">
                                <a href="{{ url('user/order_details/'.$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye">View</i></a>                               
                                <a href="{{ url('user/invoice_download/'.$order->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-download" style="color:white;">Invoice</i></a>                               
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- ./table-responsive -->
         </div><!-- ./col-md-8 -->

        </div> <!-- End Row -->
       
    </div>
</div>




@endsection