@extends('frontend.main_master')
@section('content')

		<!-- ============================================== HEADER ============================================== -->

	

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
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
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	<div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div>
	<form method="POST" action="{{ isset($guard)? url($guard.'/login'): route('login') }}" class="register-form outer-top-xs" role="form">
    @csrf	
    <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2" value="{{ __('Email') }}">Email Address <span>*</span></label>
	    	<input name="email" id="email" type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
	  	</div>
      
          <div class="form-group">
              <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
              <input type="password" name="password" required autocomplete="current-password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            </div>
            <div class="form-group">
                <label>
                    <input type="radio" id="optionsRadios2" >Remember me!
                </label>
                <a  href="{{ route('password.request') }}" class="forgot-password">
                       Forgot your password?
                    </a>
                
            </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign In</button>
	</form>				
</div>
<!-- Sign-in -->


<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Create a new account</h4>
	<p class="text title-tag-line">Create your new account.</p>
	<form method="POST" action="{{ route('register') }}" class="register-form outer-top-xs" role="form">
    @csrf    
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
            <input type="text" name="name" id="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" name="email" id="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
	  	</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
		    <input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input"  >
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input type="password" name="password" id="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
		</div>
         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	</form>
	
	
</div>	
<!-- create a new account -->
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->



        @include('frontend.body.brand')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->

@endsection()
