<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartPageController extends Controller
{
    //
    public function MyCart(){
        // Cart::destroy();    
        return view('frontend.wishlist.view_mycart');
    }//end method

    public function GetCartProduct(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = (int)str_replace(',', '', Cart::total());
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));

    }//end method
    public function RemoveCartProduct($rowId){        
        Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success'=> 'Product Removed From Cart!']);
    }//end method

    /////////// Cart Increment/////////////
    public function CartIncrement($rowId){
        $row= Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        if(Session::has('coupon')){
            $coupon_name = session()->get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            $cart_total =(int)str_replace(',', '', Cart::total()); 
            $total =$cart_total - $cart_total * $coupon->coupon_discount/100;
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round($cart_total * $coupon->coupon_discount/100 ),
                'total_amount' => round($cart_total - $cart_total * $coupon->coupon_discount/100)
                
            ]);
        }
        return response()->json('increment');
    }
    /////////// End Cart Increment/////////////


    ///////////  Cart Decrement/////////////
    public function CartDecrement($rowId){
        $row= Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        if(Session::has('coupon')){
            $coupon_name = session()->get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            $cart_total =(int)str_replace(',', '', Cart::total()); 
            $total =$cart_total - $cart_total * $coupon->coupon_discount/100;
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round($cart_total * $coupon->coupon_discount/100 ),
                'total_amount' => round($cart_total - $cart_total * $coupon->coupon_discount/100)
                
            ]);
        }
        return response()->json('decrement');
    }

    /////////// End Cart Decrement/////////////
}
