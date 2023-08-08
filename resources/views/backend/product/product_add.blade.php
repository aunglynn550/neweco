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
					<form novalidate>
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
                                            <option value="" disabled="">Select SubCategory</option>
                                          
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
								<h5>Product Name Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_name_hin" class="form-control" > </div>
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
									<input type="text" name="product_code" class="form-control" > </div>
                                    @error('product_name_code')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Quantity <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_qty" class="form-control" > </div>
                                    @error('product_qty')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Tag En <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_tags_en" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags" />  </div>
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
                                <input type="text" name="product_tags_hin" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_tags_hin')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Size En <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_size_en" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_size_en')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Size Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_size_hin" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_size_hin')
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
                                <input type="text" name="product_color_en" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_color_en')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Color Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" name="product_color_hin" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags" />  </div>
                                    @error('product_color_hin')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Selling Price <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="selling_price" class="form-control" > </div>
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
                                <input type="text" name="discount_price" class="form-control"/>  </div>
                                    @error('discount_price')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                      
                       <div class="form-group">
								<h5>Main Thambnail <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="file" name="product_thumbnail" class="form-control"/>  </div>
                                    @error('product_thumbnail')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
							</div><!--End-Form-Group-->
                              
                       </div><!-- end col-md-4 -->

                       <div class="col-md-4">
                       <div class="form-group">
								<h5>Product Discount Price <span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="file" name="multi_img[]" class="form-control"/>  </div>
                                    @error('multi_img')
                                   <span class="btn btn-danger">{{ $message }}</span>
                                    @enderror
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
								<h5>Short Description Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="short_descp_hin" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
								</div>                                  
							</div><!--End-Form-Group-->
                              
                       </div><!-- end col-md-6 -->

                    
                   </div><!--end 7th row -->


                   <div class="row"><!-- 8th row -->
                       
                       <div class="col-md-6">
                       <div class="form-group">
								<h5>Long Description English <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea id="editor1"  rows="10" cols="80" name="long_descp_en" >
                                        This is textarea
                                    </textarea>
								</div>
                                  
							</div><!--End-Form-Group-->

                       </div><!-- end col-md-6 -->

                       <div class="col-md-6">
                      
                       <div class="form-group">
								<h5>Long Description Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea id="editor2" rows="10" cols="80" name="long_descp_hin" ></textarea>
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
											<input type="checkbox" id="checkbox_2" name="hot_deal"  value="1">
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
  
@endsection