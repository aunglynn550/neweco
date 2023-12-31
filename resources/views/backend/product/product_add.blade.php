@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
					<form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data">
                        @csrf

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
                                            <option value="{{ $brand->id }}" >{{ $brand->brand_name_en }}</option>
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
                                            <option value="{{ $cate->id }}" >{{ $cate->category_name_en }}</option>
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
									<input type="text" name="product_name_en" class="form-control" > </div>
                                    @error('product_name_en')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Name Chinese<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_name_chi" class="form-control" > </div>
                                    @error('product_name_chi')
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
									<input type="text" name="product_code" required="" class="form-control" > </div>
                                    @error('product_name_code')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Quantity <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_qty" required="" class="form-control" > </div>
                                    @error('product_qty')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Tag En <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_tags_en" value="" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_name_en')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->


                   </div><!--end 3rd row -->

                   
                   <div class="row"><!-- 4th row -->
                       
                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Tag Chinese<span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_tags_chi" value="" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_tags_chi')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Size En <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_size_en" value="Lorem,Ipsum,Amet" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_size_en')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Size Chinese<span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_size_chi" value="Lorem,Ipsum,Amet" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_size_chi')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->


                   </div><!--end 4th row -->


                   <div class="row"><!-- 5th row -->
                       
                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Color En <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_color_en" value="Lorem,Ipsum,Amet" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_color_en')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Color Chinese<span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_color_chi" value="Lorem,Ipsum,Amet" required="" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_color_chi')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Selling Price <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="selling_price" class="form-control" required=""> </div>
                                    @error('selling_price')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->


                   </div><!--end 5th row -->

                   <div class="row"><!-- 6th row -->
                       
                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Discount Price <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="discount_price" class="form-control" required=""/>  </div>
                                    @error('discount_price')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                      
                       <div class="form-group">
								<h5>Main Thambnail <span class="text-danger">*</span></h5>
								<div class="controls">
                                    <input type="file" name="product_thumbnail" required="" class="form-control" onchange="mainThamUrl(this)"/> 
                                    @error('product_thumbnail')
                                    <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="" id="mainThumb" alt="">
                                </div>
                                 
							</div><!--End-Form-Group-->
                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Multiple Image <span class="text-danger">*</span></h5>
								<div class="controls">
                                    <input type="file" name="multi_img[]" required="" class="form-control" multiple="" id="multiImg"/>  
                                    @error('multi_img')
                                    <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="row" id="preview_img"></div>
                                </div>
                                  
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->


                   </div><!--end 6th row -->

                   <div class="row"><!-- 7th row -->
                       
                       <div class="col-md-6">
                       <div class="form-group">
								<h5>Short Description English <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
								</div>
                                  
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-6 -->

                       <div class="col-md-6">
                      
                       <div class="form-group">
								<h5>Short Description Chinese<span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="short_descp_chi" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
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
                                        This is textarea
                                    </textarea>
								</div>
                                  
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-6 -->

                       <div class="col-md-6">
                      
                       <div class="form-group">
								<h5>Long Description chinese<span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea id="editor2" required="" rows="10" cols="80" name="long_descp_chi" ></textarea>
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
											<input type="checkbox" id="checkbox_2" name="hot_deals"  value="1">
											<label for="checkbox_2">Hot Deals</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" name="featured" value="1">
											<label for="checkbox_3">Featured</label>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_4" name="special_offer" value="1">
											<label for="checkbox_4">Special Offers</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_5" name="special_deals" value="1">
											<label for="checkbox_5">Special Deals</label>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
						
                        <div class="col-md-6">
                      
                      <div class="form-group">
                               <h5>Digital Product <span class="text-danger">pdf,xlx,csv</span></h5>
                               <div class="controls">
                                   <input type="file" name="file" class="form-control"/>                                   
                               </div>
                                
                           </div><!--End-Form-Group-->
                             
                      </div><!-- end col-md-4 -->
						
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info" value="Add Product">
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