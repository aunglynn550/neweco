<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class AllUserController extends Controller
{
    //
    public function MyOrders(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $orders = Order::where('user_id', Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_view',compact('orders','user'));
    }//end method

    public function OrderDetails($order_id){
        $id = Auth::user()->id;
        $user = User::find($id);
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_details',compact('order','orderItem','user'));
    }//end method

    public function InvoiceDownload($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        

        
        $pdf = PDF::loadView('frontend.user.order.order_invoice',compact('order',
                    'orderItem'))->setPaper('a4')->setOptions([
                        'tempDir' => public_path(),
                        'chroot'  => public_path(),
        ]);
       
        return $pdf->download('invoice.pdf');
    }//end method
}
