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
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_details',compact('order','orderItem'));
    }//end method
}
