@extends('frontend.main_master')
@section('content')

		<!-- ============================================== HEADER ============================================== -->

	

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Forget Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Forget Password</h4>
	<p class="">Forget your password? No problem.</p>

    <form method="POST" action="{{ route('password.email') }}">
    @csrf	
    <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2" value="{{ __('Email') }}">Email Address <span>*</span></label>
	    	<input name="email" id="email" type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
	  	</div>
      
        
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
	</form>				
</div>
<!-- Sign-in -->


			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->



        @include('frontend.body.brand')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->

@endsection()
