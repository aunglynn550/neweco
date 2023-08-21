<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart(Request $request,$id){
        $product = Product::findOrFail($id);
        if($product->discount_price == NULL){
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price'=> $product->selling_price,
                'weight' =>1,
                'option' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success'=>'Successfully Added On your Cart']);
        }else{

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price'=> $product->discount_price,
                'weight' =>1,
                'option' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success'=>'Successfully Added On Your Cart!']);
        }

    }    //end method

    //Mini Cart Section

    public function AddMiniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));
    }//end method


    ///remove Mini Cart

    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success'=> 'Product Remove From Cart!']);
    }///End Method


    //add to Wishlist
    public function addToWishList(Request $request,$product_id){
        if(Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if(!$exists){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully Added To Your WishList']);
            }else{
                return response()->json(['error' => 'This Product has Already On Your WishList']);
            }
           
        }else{
            return response()->json(['error' => 'At First Login Your Account ']);
        }
    }//end method

  
}
