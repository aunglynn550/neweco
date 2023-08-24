<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SliderController;


use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\WishlistController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('admin:admin')->group(function (){
    Route::get('admin/login',[AdminController::class,'loginForm']);
    Route::post('admin/login',[AdminController::class,'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function (){

    // Admin All Routes

Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password',[AdminProfileController::class,'AdminUpdateChangePassword'])->name('update.change.password');


//Admin Brand All Routes

Route::prefix('brand')->group(function(){

    Route::get('/view',[BrandController::class,'BrandView'])->name('all.brand');
    Route::post('/store',[BrandController::class,'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}',[BrandController::class,'BrandEdit'])->name('brand.edit');
    Route::post('/update',[BrandController::class,'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');

});
//Admin Category All Routes

Route::prefix('category')->group(function(){

    Route::get('/view',[CategoryController::class,'CategoryView'])->name('view.category');
    Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');
    Route::post('/update/{id}',[CategoryController::class,'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');


//Admin Sub Category All Routes
Route::get('/sub/view',[SubCategoryController::class,'SubCategoryView'])->name('view.sub.category');
Route::post('/sub/store',[SubCategoryController::class,'SubCategoryStore'])->name('subcategory.store');
Route::get('/sub/edit/{id}',[SubCategoryController::class,'SubCategoryEdit'])->name('subcategory.edit');
Route::post('sub/update',[SubCategoryController::class,'SubCategoryUpdate'])->name('subcategory.update');
Route::get('sub/delete/{id}',[SubCategoryController::class,'SubCategoryDelete'])->name('subcategory.delete');


//Admin Sub Category All Routes
Route::get('sub/sub/view',[SubCategoryController::class,'SubSubCategoryView'])->name('view.sub.subcategory');

Route::get('subcategory/ajax/{category_id}',[SubCategoryController::class,'GetSubCategory']);
Route::get('sub-subcategory/ajax/{subcategory_id}',[SubCategoryController::class,'GetSubSubCategory']);

Route::post('sub/sub/store',[SubCategoryController::class,'SubSubCategoryStore'])->name('subsubcategory.store');
Route::get('sub/sub/edit/{id}',[SubCategoryController::class,'SubSubCategoryEdit'])->name('subsubcategory.edit');
Route::post('sub/sub/update',[SubCategoryController::class,'SubSubCategoryUpdate'])->name('subsubcategory.update');
Route::get('sub/sub/delete/{id}',[SubCategoryController::class,'SubSubCategoryDelete'])->name('subsubcategory.delete');

});



//Admin Products All Routes

Route::prefix('products')->group(function(){

    Route::get('/add',[ProductController::class,'AddProduct'])->name('add-product');
    Route::post('/store',[ProductController::class,'StoreProduct'])->name('product-store');
    Route::get('/manage',[ProductController::class,'ManageProduct'])->name('manage-product');
    Route::get('/edit/{id}',[ProductController::class,'EditProduct'])->name('product.edit');
    Route::post('/data/update',[ProductController::class,'ProductDataUpdate'])->name('product-update');
    Route::post('/image/update',[ProductController::class,'MultiImageUpdate'])->name('update-product-image');
    Route::post('/thambnail/update',[ProductController::class,'ThambnailImageUpdate'])->name('update-product-thambnail');
    Route::get('multiimg/delete/{id}',[ProductController::class,'MultiImageDelete'])->name('product.multiimg.delete');

    Route::get('inactive/{id}',[ProductController::class,'ProductInactive'])->name('product.inactive');
    Route::get('active/{id}',[ProductController::class,'ProductActive'])->name('product.active');
    Route::get('delete/{id}',[ProductController::class,'ProductDelete'])->name('product.delete');
});



//Admin Slider All Routes

Route::prefix('slider')->group(function(){

    Route::get('/view',[SliderController::class,'SliderView'])->name('manage-slider');
    Route::post('/store',[SliderController::class,'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}',[SliderController::class,'SliderEdit'])->name('slider.edit');
    Route::post('/update',[SliderController::class,'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}',[SliderController::class,'SliderDelete'])->name('slider.delete');

    Route::get('inactive/{id}',[SliderController::class,'SliderInactive'])->name('slider.inactive');
    Route::get('active/{id}',[SliderController::class,'SliderActive'])->name('slider.active');

});





//Admin Coupon All Routes

Route::prefix('coupons')->group(function(){

    Route::get('/view',[CouponController::class,'CouponView'])->name('manage-coupon');
    Route::post('/store',[CouponController::class,'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}',[CouponController::class,'CouponEdit'])->name('coupon.edit');
    Route::post('/update/{id}',[CouponController::class,'CouponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}',[CouponController::class,'CouponDelete'])->name('coupon.delete');
   

});



//Admin Shipping All Routes

Route::prefix('shipping')->group(function(){

    // Ship Division All Routes
    Route::get('division/view',[ShippingAreaController::class,'DivisionView'])->name('manage-division');
    Route::post('division/store',[ShippingAreaController::class,'DivisionStore'])->name('division.store');
    Route::get('division/edit/{id}',[ShippingAreaController::class,'DivisionEdit'])->name('division.edit');
    Route::post('division/update/{id}',[ShippingAreaController::class,'DivisionUpdate'])->name('division.update');
    Route::get('division/delete/{id}',[ShippingAreaController::class,'DivisionDelete'])->name('division.delete');
   
// Ship District All Routes
    Route::get('district/view',[ShippingAreaController::class,'DistrictView'])->name('manage-district');
    Route::post('district/store',[ShippingAreaController::class,'DistrictStore'])->name('district.store');
    Route::get('district/edit/{id}',[ShippingAreaController::class,'DistrictEdit'])->name('district.edit');
    Route::post('district/update/{id}',[ShippingAreaController::class,'DistrictUpdate'])->name('district.update');
    Route::get('district/delete/{id}',[ShippingAreaController::class,'DistrictDelete'])->name('district.delete');
     
// Ship State All Routes
Route::get('state/view',[ShippingAreaController::class,'StateView'])->name('manage-state');
Route::post('state/store',[ShippingAreaController::class,'StateStore'])->name('state.store');
Route::get('state/edit/{id}',[ShippingAreaController::class,'StateEdit'])->name('state.edit');
Route::post('state/update/{id}',[ShippingAreaController::class,'StateUpdate'])->name('state.update');
Route::get('state/delete/{id}',[ShippingAreaController::class,'StateDelete'])->name('state.delete');


Route::get('/division/district/ajax/{district_id}',[ShippingAreaController::class,'GetDistrict']);



});

});


Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');

});



//User All Routes

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard',compact('user'));
    })->name('dashboard');

});
Route::get('/',[IndexController::class,'Index']);
Route::get('user/logout',[IndexController::class,'UserLogout'])->name('user.logout');
Route::get('user/profile',[IndexController::class,'UserProfile'])->name('user.profile');
Route::post('user/profile/store',[IndexController::class,'UserProfileStore'])->name('user.profile.store');
Route::get('user/change/password',[IndexController::class,'UserChangePassword'])->name('change.password');
Route::post('user/update/password',[IndexController::class,'UserPasswordUpdate'])->name('user.password.update');






//// Frontend All Routes /////
/// Multi Language All Routes ////

Route::get('/language/hindi', [LanguageController::class, 'Hindi'])->name('hindi.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');


//Frontend Product Details Page Url
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);


//Frontend Product Tags Page
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);

//Frontend Subcategory Wise Data
Route::get('subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);

//Frontend SubSubcategory Wise Data
Route::get('subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);


//Product VIew Model with Ajax
Route::get('product/view/model/{id}', [IndexController::class, 'ProductViewAjax']);


//Add to Cart Store Data
Route::post('cart/data/store/{id}', [CartController::class, 'AddToCart']);


//Mini Cart Get Data
Route::get('product/mini/cart/', [CartController::class, 'AddMiniCart']);


// Remove Mini Cart Data
Route::get('minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);



Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){

        //WishList Page
        Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');


        //Add to WishList
        Route::post('add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);


        Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);


        Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);


      
});


    //My Cart Page All Routes
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);
Route::get('/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);

Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

// FrontEnd Coupon Option

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

