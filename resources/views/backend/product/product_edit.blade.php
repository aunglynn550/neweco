@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
			  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Products</h4>
			  <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('product-update') }}" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $products->id }}">

					  <div class="row">
						<div class="col-12">
                            
                        
                        <div class="row"><!-- first row -->
                       
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" required="" class="form-control" aria-invalid="false">
                                            <option value="" disabled="" selected="">Select Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected':'' }} >{{ $brand->brand_name_en }}</option>
                                            @endforeach
                                        </select>
                                    @error('brand_id')
                                        <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="help-block"></div></div>
                            </div><!--End-Form-Group-->

                            </div><!-- end col-md-4 -->

                            <div class="col-md-4">
                            <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" required="" class="form-control" aria-invalid="false">
                                            <option value="" disabled="" selected="">Select Category</option>
                                            @foreach($categories as $cate)
                                            <option value="{{ $cate->id }}" {{ $cate->id == $products->category_id ? 'selected':'' }}>{{ $cate->category_name_en }}</option>
                                            @endforeach
                                        </select>
                                    @error('category_id')
                                        <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="help-block"></div></div>
                            </div><!--End-Form-Group-->

                            </div><!-- end col-md-4 -->

                            <div class="col-md-4">
                            <div class="form-group">
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" required="" class="form-control" aria-invalid="false">
                                            <option value="" disabled="" selected="">Select SubCategory</option>
                                            @foreach($subcategory as $subcate)
                                            <option value="{{ $subcate->id }}" {{ $subcate->id == $products->subcategory_id ? 'selected':'' }}>{{ $subcate->subcategory_name_en }}</option>
                                            @endforeach
                                          
                                        </select>
                                    @error('subcategory_id')
                                        <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="help-block"></div></div>
                            </div><!--End-Form-Group-->

                            </div><!-- end col-md-4 -->


                        </div><!--end first row -->


                        <div class="row"><!-- 2nd row -->
                       
                       <div class="col-md-4">
                           <div class="form-group">
                               <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <select name="subsubcategory_id" required="" class="form-control" aria-invalid="false">
                                       <option value="" disabled="" selected="">Select SubSubCategory</option>
                                       @foreach($subsubcategory as $subsubcate)
                                            <option value="{{ $subsubcate->id }}" {{ $subsubcate->id == $products->subsubcategory_id ? 'selected':'' }}>{{ $subsubcate->subsubcategory_name_en }}</option>
                                        @endforeach
                                    
                                   </select>
                               @error('subsubcategory_id')
                                   <span class="btn btn-danger">{{ $message }}</span>
                               @enderror
                               <div class="help-block"></div></div>
                       </div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Name En <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_name_en" value="{{ $products->product_name_en }}" class="form-control" > </div>
                                    @error('product_name_en')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Name Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_name_hin" value="{{ $products->product_name_hin }}" class="form-control" > </div>
                                    @error('product_name_hin')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->


                   </div><!--end 2nd row -->


                   <div class="row"><!-- 3rd row -->
                       
                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Code <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_code" value="{{ $products->product_code  }}"  required="" class="form-control" > </div>
                                    @error('product_name_code')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Quantity <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_qty" value="{{ $products->product_qty  }}" required="" class="form-control" > </div>
                                    @error('product_qty')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Tag En <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_tags_en" value="{{ $products->product_tags_en  }}" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_name_hin')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->


                   </div><!--end 3rd row -->

                   
                   <div class="row"><!-- 4th row -->
                       
                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Tag Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_tags_hin" value="{{ $products->product_tags_hin  }}" value="Lorem,Ipsum,Amet" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_tags_hin')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Size En <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_size_en" value="{{ $products->product_size_en  }}" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_size_en')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Size Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_size_hin" value="{{ $products->product_size_hin  }}" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_size_hin')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->


                   </div><!--end 4th row -->


                   <div class="row"><!-- 5th row -->
                       
                       <div class="col-md-6">
                       <div class="form-group">
								<h5>Product Color En <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_color_en" value="{{ $products->product_color_en  }}" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_color_en')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-6 -->

                       <div class="col-md-6">
                       <div class="form-group">
								<h5>Product Color Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_color_hin" value="{{ $products->product_color_hin  }}" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_color_hin')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                              
                       </div><!-- end col-md-6 -->

                    


                   </div><!--end 5th row -->

                   <div class="row"><!-- 6th row -->
                       
                   <div class="col-md-6">
                  
                   <div class="form-group">
                            <h5>Product Selling Price <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="selling_price" value="{{ $products->selling_price  }}" class="form-control" required=""> </div>
                                @error('selling_price')
                               <span class="btn btn-danger">{{ $message }}</span>
                                @enderror
                        </div><!--End-Form-Group-->
                          
                   </div><!-- end col-md-6 -->

                       <div class="col-md-6">
                       <div class="form-group">
								<h5>Product Discount Price <span class="text-danger">*</span></h5> 
								<div class="controls">
                                <input type="text" name="discount_price" value="{{ $products->discount_price  }}" class="form-control" required=""/>  </div>
                                    @error('discount_price')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-6 -->
            

                   </div><!--end 6th row -->

                   <div class="row"><!-- 7th row -->
                       
                       <div class="col-md-6">
                       <div class="form-group">
								<h5>Short Description English <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text">
                                    {{  $products->short_descp_en}}
                                    </textarea>
								</div>
                                  
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-6 -->

                       <div class="col-md-6">
                      
                       <div class="form-group">
								<h5>Short Description Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="short_descp_hin" id="textarea" class="form-control" required placeholder="Textarea text">
                                    {{  $products->short_descp_hin }}
                                    </textarea>
								</div>                                  
							</div><!--End-Form-Group-->
                              
                       </div><!-- end col-md-6 -->

                    
                   </div><!--end 7th row -->


                   <div class="row"><!-- 8th row -->
                       
                       <div class="col-md-6">
                       <div class="form-group">
								<h5>Long Description English <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea id="editor1" required=""  rows="10" cols="80" name="long_descp_en" >
                                    {{ $products->long_descp_en  }}
                                    </textarea>
								</div>
                                  
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-6 -->

                       <div class="col-md-6">
                      
                       <div class="form-group">
								<h5>Long Description Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea id="editor2" required="" rows="10" cols="80" name="long_descp_hin" >
                                    {{  $products->long_descp_hin }}
                                    </textarea>
								</div>                                  
							</div><!--End-Form-Group-->
                              
                       </div><!-- end col-md-6 -->

                    
                   </div><!--end 8th row -->
                   <hr>
							
							
							
							
						<div class="row">
                        <div class="col-md-6">
								<div class="form-group">
									<h5>Checkbox Group <span class="text-danger">*</span></h5>
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_2" name="hot_deals"  value="1" {{ $products->hot_deals == 1 ? 'checked':'' }}>
											<label for="checkbox_2">Hot Deals</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $products->featured == 1 ? 'checked':'' }}>
											<label for="checkbox_3">Featured</label>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $products->special_offer == 1 ? 'checked':'' }}>
											<label for="checkbox_4">Special Offers</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $products->special_deals == 1 ? 'checked':'' }}>
											<label for="checkbox_5">Special Deals</label>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info" value="Update Product">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->


        <!--//////////////////////Multiple Images Update Area//////////////////////////// -->

        <section class="content">
            <div class="row">
                <div class="col-md-12">

                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                    </div><!-- end box-header -->

                    <form action="{{ route('update-product-image') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                        @foreach($multiImgs as $img)
                            <div class="col-md-3">
                            <div class="card">
                                <img src="{{ asset($img->photo_name) }}" class="card-img-top" height="140px" width="280px" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('product.multiimg.delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                    </h5>
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                            <input type="file" class="form-control" name="multi_img[{{ $img->id }}]">
                                        </div>
                                    </p>
                                  
                                </div><!-- end card-body -->
                                </div><!-- end card -->

                            </div><!-- end col-md-3 -->
                        @endforeach
                        </div>

                        <div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info" value="Update Image">
						</div>
                        <br>
                        <br>
                    </form>

				 
				</div><!-- end border-info -->

                </div><!-- end col-md-12 -->

            </div><!-- end row -->
            

        </section>
     


 <!--////////////////////// End Multiple Images Update Area//////////////////////////// -->




     <!--////////////////////// Thambnail Images Update Area//////////////////////////// -->

     <section class="content">
            <div class="row">
                <div class="col-md-12">

                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Thambnail Image <strong>Update</strong></h4>
                    </div><!-- end box-header -->

                    <form action="{{ route('update-product-thambnail') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $products->id }}">
                        <input type="hidden" name="old_img" value="{{ $products->product_thambnail }}">
                        <div class="row row-sm">
                        
                            <div class="col-md-3">
                            <div class="card">
                                <img src="{{ asset($products->product_thambnail) }}" class="card-img-top" height="140px" width="280px" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                    </h5>
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                            <input type="file" name="product_thumbnail"  class="form-control" onchange="mainThamUrl(this)"/> 
                                            <img src="" id="mainThumb" alt="">
                                        </div>
                                    </p>
                                  
                                </div><!-- end card-body -->
                                </div><!-- end card -->

                            </div><!-- end col-md-3 -->
                       
                        </div>

                        <div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info" value="Update Image">
						</div>
                        <br>
                        <br>
                    </form>

				 
				</div><!-- end border-info -->

                </div><!-- end col-md-12 -->

            </div><!-- end row -->
            

        </section>
     


 <!--////////////////////// End Thambnail Images Update Area//////////////////////////// -->



	  </div>



      
<script text="text/javascript"> 
    $(document).ready(function(){

        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();

            if(category_id){
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                    type : "GET",
                    dataType: "json",
                    success:function(data){
                        $('select[name="subsubcategory_id"]').html('');
                        var d=$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key,value){
                            $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'
                            +value.subcategory_name_en+'</option>');

                        });
                    }
                });
            }else{
                alert('danger');
            }
        });


        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();

            if(subcategory_id){
                $.ajax({
                    url: "{{ url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type : "GET",
                    dataType: "json",
                    success:function(data){
                        var d=$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key,value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+value.id+'">'
                            +value.subsubcategory_name_en+'</option>');

                        });
                    }
                });
            }else{
                alert('danger');
            }
        });


    });
</script>

<!-- For Main Thumbnail -->

<script type="text/javascript">
    function mainThamUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThumb').attr('src',e.target.result).width(80).height(80);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>


<!-- For Multiple imgaes -->

<script type="text/javascript">
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>
  
@endsection