<!DOCTYPE html>
<html lang="en">
	<!-- @php 
	$seo = App\Models\Seo::find(1);
	@endphp -->

<head>
<!-- /// Google Analytics Code // -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="robots" content="all">
<meta name="csrf_token" content="{{ csrf_token() }}">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:ital,wght@0,100;0,300;0,400;1,100&family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Work+Sans:wght@400;700;900&display=swap" rel="stylesheet"> 

<script src="https://js.stripe.com/v3/"></script>

</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js "></script>
	<script>
		@if(Session::has('message'))
		var type="{{ Session::get('alert-type','info') }}"

		switch(type){
			case 'info':
				toastr.info("{{ Session::get('message') }}");
				break;
			case 'success':
				toastr.success("{{ Session::get('message') }}");
				break;
			case 'warning':
				toastr.warning("{{ Session::get('message') }}");
				break;
			case 'error':
				toastr.error("{{ Session::get('message') }}");
				break;
		}
		@endif
	</script>


<!--Add To Cart Product modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
			<div class="col-md-4">

			<div class="card" style="width: 18rem;">
				<img id="pimage" src="..." class="card-img-top" alt="..." style="height: 200px; width:200px;" >
				
			</div><!-- ./card -->

			</div><!-- ./col-md-4 -->

			<div class="col-md-4">

			<ul class="list-group">
				<li class="list-group-item">Product Price:
					<strong class="text-danger">$
					 	<span id="pprice"></span>
					</strong>
					<del id="oldprice">$</del>
				</li>
				<li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
				<li class="list-group-item">Category: <strong id="pcategory"></strong></li>
				<li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
				<li class="list-group-item">Stock : <span class="badge badge-pill badge-success" 
													id="available" style="background: green;"></span>
													<span class="badge badge-pill badge-danger" 
													id="stockout" style="background: red;"></span></li>
			</ul>
			</div><!-- ./col-md-4 -->

			<div class="col-md-4">
			<div class="form-group">
				<label for="exampleFormControlSelect1">Choose Color</label>
				<select class="form-control" id="color" name="color">			
				
				</select>
			</div><!-- ./form-group -->

			<div class="form-group" id="sizeArea">
				<label for="exampleFormControlSelect1">Choose Size</label>
				<select class="form-control" id="size" name="size">								
				</select>
			</div><!-- ./form-group -->
			<div class="form-group">
				<label for="exampleFormControlInput1">Quntity</label>
				<input type="number" class="form-control" id="qty" value="1" min="1">
			</div><!-- ./form-group -->
			<input type="hidden" name="" id="product_id">
			<button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to Cart</button>
			</div><!-- ./col-md-4 -->

		</div><!-- ./row -->
      </div>
		<!-- ./modal-body -->

      
    </div>
  </div>
</div>	<!-- ./modal -->
	<!-- End Add To Cart Product Modal -->
	<script type="text/javascript">
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr('content')
			}
		})

		function productView(id){
			// alert(id)
			$.ajax({
				type:'GET',
				url:'/product/view/model/'+id,
				dataType:'json',
				success:function(data){
					// console.log(data)
					$('#pname').text(data.product.product_name_en)
					$('#price').text(data.product.selling_price)
					$('#pcode').text(data.product.product_code)
					$('#pcategory').text(data.product.category.category_name_en)
					$('#pbrand').text(data.product.brand.brand_name_en)
					$('#pimage').attr('src','/'+data.product.product_thambnail)
					$('#product_id').val(id)

					//Product Price
					if(data.product.discount_price == null){
						$('#pprice').text('')
						$('#oldprice').text('')
						$('#pprice').text(data.product.selling_price)
					}else{
						$('#pprice').text(data.product.discount_price)
						$('#oldprice').text(data.product.selling_price)
					}//end product price


					//Stock Option
					if(data.product.product_qty > 0){
						$('#available').text('');
						$('#stockout').text('');
						$('#available').text('available');
					}else{
						$('#available').text('');
						$('#stockout').text('');
						$('#stockout').text('stockout');
					}//end stock option
					
					//Color
					$('select[name="color"]').empty()
					$.each(data.color,function(key,value){
						$('select[name="color"]').append('<option value="'+value+'">'+value+'</option>')
					})//end Color

					//Size
					$('select[name="size"]').empty()
					$.each(data.size,function(key,value){
						$('select[name="size"]').append('<option value="'+value+'">'+value+'</option>')
						if(data.size == ""){
							$('#sizeArea').hide();
						}else{
							$('#sizeArea').show();
						}
					})
					//end Size
				}
			})
		}
		//End Product View With Modal


		//Start Add To Cart
			function addToCart(){
				var product_name = $('#pname').text();
				var id =$('#product_id').val();
				var color = $('#color option:selected').text();
				var size = $('#size option:selected').text();
				var quantity = $('#qty').val();
				$.ajax({
					type: "POST",
					dataType:'json',
					data:{
						color:color,size:size, quantity:quantity, product_name:product_name
					},
					url : "/cart/data/store/"+id,
					success:function(data){
						miniCart()
						$('#closeModel').click()
						// console.log(data)

						//start message
							const Toast = Swal.mixin({
								toast :true,
								position : 'top-end',
								icon : 'success',
								showConfirmButton : false,
								timer:5000
							})
							if($.isEmptyObject(data.error)){
								Toast.fire({
									type :'success',
									title: data.success
								})

							}else{
								Toast.fire({
									type :'error',
									title: data.error
							})
						}
						//end message
					}
				})
			}
		//End Add to Cart

	</script>

	<script type="text/javascript">
		function miniCart(){
			$.ajax({
				type : 'GET',
				url :'/product/mini/cart',
				dataType : 'json',
				success:function(response){
					$('span[id="cartSubTotal"]').text(response.cartTotal)
					$('#cartQty').text(response.cartQty)
					var miniCart = ""
					$.each(response.carts,function(key,value){
						miniCart += `<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action"> 
					<button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`
					});
					$('#miniCart').html(miniCart);
				}
			})
		}

		miniCart();

	////// MiniCart Remove Start////////////

	function miniCartRemove(rowId){
		$.ajax({
			type:'GET',
			url:'/minicart/product-remove/'+rowId,
			dataType:'json',
			success:function(data){
				miniCart()

				//start message
				const Toast = Swal.mixin({
								toast :true,
								position : 'top-end',
								icon : 'success',
								showConfirmButton : false,
								timer:5000
							})
							if($.isEmptyObject(data.error)){
								Toast.fire({
									type :'success',
									title: data.success
								})

							}else{
								Toast.fire({
									type :'error',
									title: data.error
							})
						}
						//end message

			}
		})

	}

	////// MiniCart Remove End////////////	


	</script>

	<!-- /////// Add WishList //////////// -->
	<script type="text/javascript">
		function addToWishList(product_id){
			$.ajax({
				type : "POST",
				dataType:'json',
				url:'/user/add-to-wishlist/'+product_id,
				success:function(data){

				}
			})
		}

	</script>

	<!-- /////// End Add WishList //////// -->

	<!-- ///////// Load Wish List Data//////////////-->
	<script type="text/javascript">
	function wishlist(){
			$.ajax({
				type : 'GET',
				url :'/user/get-wishlist-product',
				dataType : 'json',
				success:function(response){
					
					var rows = ""
					$.each(response,function(key,value){
						rows += `<tr>
					<td class="col-md-2"><img src="/${value.product.product_thambnail}" alt="imga"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
					
						<div class="price">
						${value.product.discount_price == null
						? `${value.product.selling_price}`
						: `${value.product.discount_price}
							<span>${value.product.selling_price}</span>`
						}							
						</div>
					</td>
					<td class="col-md-2">
					<button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal"
                    id="${value.product.product_id} " onclick="productView(this.id)">Add To Cart </button>
					</td>
					<td class="col-md-1 close-btn">
						<button type="submit"  class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
					</td>
				</tr>
				`
					});
					$('#wishlist').html(rows);
				}
			})
		}

		wishlist();

			////// Wishlist Remove Start////////////

	function wishlistRemove(id){
		$.ajax({
			type:'GET',
			url:'/user/wishlist-remove/'+id,
			dataType:'json',
			success:function(data){
				wishlist()

				//start message
				const Toast = Swal.mixin({
								toast :true,
								position : 'top-end',
							
								showConfirmButton : false,
								timer:5000
							})
							if($.isEmptyObject(data.error)){
								Toast.fire({
									type :'success',
									title: data.success
								})

							}else{
								Toast.fire({
									type :'error',
									icon : 'error',
									title: data.error
							})
						}
						//end message

			}
		})

	}

	////// Wishlist Remove End////////////	


	///////// End Load Wish List Data/////////

		</script>



<!-- ///////////////Load My Cart/////////////////// -->
		<script type="text/javascript">
				function cartPage(){
						$.ajax({
							type : 'GET',
							url :'/get-cart-product',
							dataType : 'json',
							success:function(response){
								
								var rows = ""
								$.each(response.carts,function(key,value){
									rows += `<tr>
								<td class="col-md-2"><img src="/${value.options.image}" alt="imga" style="width:60px; height:60px;"></td>
								<td class="col-md-2">
									<div class="product-name"><a href="#">${value.name}</a></div>
								
									<div class="price">
									${value.price}
									</div>
								</td>

								<td class="col-md-2">
									<strong>${value.options.color}</strong>
								</td>

								<td class="col-md-2">
								${value.options.size == null 
									? `<span>...</span>`
									: `<strong>${value.options.size}</strong>`
								}
									
								</td>

								<td class="col-md-2">
								<button type="submit" class="btn btn-success btn-sm" id="${value.rowId}"
									onclick="cartIncrement(this.id)">+</button>
								<input type="text" value="${value.qty}" min="1" max="10" disabled="" style="width:25px;">
								<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}"
									onclick="cartDecrement(this.id)">-</button>
								</td>

								<td class="col-md-2">
									<strong>$${value.subtotal}</strong>
								</td>
								
								<td class="col-md-1 close-btn">
									<button type="submit"  class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
								</td>
							</tr>
							`
								});
								$('#cartPage').html(rows);
							}
						})
					}

					cartPage();

			////// Cart Remove Start////////////

	function cartRemove(id){
		$.ajax({
			type:'GET',
			url:'/cart-remove/'+id,
			dataType:'json',
			success:function(data){
				couponCalculation()
				cartPage()
				miniCart()

				$('#couponField').show()
				$('#coupon_name').val('')

				//start message
				const Toast = Swal.mixin({
								toast :true,
								position : 'top-end',
							
								showConfirmButton : false,
								timer:5000
							})
							if($.isEmptyObject(data.error)){
								Toast.fire({
									type :'success',
									title: data.success
								})

							}else{
								Toast.fire({
									type :'error',
									icon : 'error',
									title: data.error
							})
						}
						//end message

			}
		})

	}

	////// Cart Remove End////////////	

	/////Cart Increment//////////////
	function cartIncrement(rowId){
		$.ajax({
			type:'GET',
			url:"/cart-increment/"+rowId,
			success:function(data){
				cartPage();
				miniCart();
				couponCalculation();
			}
		})
		
	}
	///// End Cart Increment//////////////

	/////Cart Decrement//////////////
	function cartDecrement(rowId){
		$.ajax({
			type:'GET',
			url:"/cart-decrement/"+rowId,
			success:function(data){
				cartPage();
				miniCart();
				couponCalculation();
			}
		})
		
	}
	///// End Cart Decrement//////////////


		</script>
<!-- //////// End Load My Cart//////// -->

<!-- /////////========= Coupon Apply Start==========/////////// -->

<script type="text/javascript">
	function applyCoupon(){
		var coupon_name = $('#coupon_name').val()
		$.ajax({
			type:'POST',
			dataType:'json',
			data:{coupon_name:coupon_name},
			url:"{{ url('/coupon-apply') }}",
			success:function(data){
				couponCalculation();
				if(data.validity == true){
					$('#couponField').hide();					
				}
					//start message
					const Toast = Swal.mixin({
								toast :true,
								position : 'top-end',
							
								showConfirmButton : false,
								timer:5000
							})
							if($.isEmptyObject(data.error)){
								Toast.fire({
									type :'success',
									icon : 'success',
									title: data.success
								})

							}else{
								Toast.fire({
									type :'error',
									icon : 'error',
									title: data.error
									
							})
						}
						//end message
			}
		})
	}
	


	function couponCalculation(){
		$.ajax({
			type : 'GET',
			url: "{{ url('/coupon-calculation') }}",
			dataType:'json',
			success:function(data){
				if(data.total){
					$('#couponCalField').html(
						`<tr>
							<th>
								<div class="cart-sub-total">
									Subtotal<span class="inner-left-md">${data.total}</span>
									
								
								</div>
								<div class="cart-grand-total">
									Grand Total<span class="inner-left-md">${data.total}</span>
								</div>
							</th>
						</tr>`
					)
				
				}else{
					$('#couponCalField').html(
						`<tr>
							<th>
								<div class="cart-sub-total">
									Subtotal<span class="inner-left-md">${data.subtotal}</span>
								</div>

								<div class="cart-sub-total">
									Coupon<span class="inner-left-md">${data.coupon_name}</span>
									<button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i></button>
								</div>

								<div class="cart-sub-total">
									Discount Amount<span class="inner-left-md">${data.discount_amount}</span>
								</div>

								<div class="cart-grand-total">
									Grand Total<span class="inner-left-md">${data.total_amount}</span>
								</div>
							</th>
						</tr>`
					)
				}
			}
		})
	}
	couponCalculation()
</script>


<!-- /////////========= End Coupon Apply ==========/////////// -->


<!-- /////////========= Start Coupon Remove ==========/////////// -->


<script type="text/javascript">
function couponRemove(){

	
	$.ajax({
		type: 'GET',
		url: "{{ url('/coupon-remove') }}",
		dataType:'json',
		success:function(data){
			couponCalculation()
			$('#couponField').show();
			$('#coupon_name').val('');
				//start message
				const Toast = Swal.mixin({
								toast :true,
								position : 'top-end',
							
								showConfirmButton : false,
								timer:5000
							})
							if($.isEmptyObject(data.error)){
								Toast.fire({
									type :'success',
									title: data.success
								})

							}else{
								Toast.fire({
									type :'error',
									icon : 'error',
									title: data.error
							})
						}
						//end message
		}
	})
	}
//couponRemove()
</script>
<!-- /////////========= End Coupon Remove ==========/////////// -->

	
</body>
</html>