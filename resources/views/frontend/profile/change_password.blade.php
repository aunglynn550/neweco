@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
        @include('frontend.common.user_sidebar')

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi..</span><strong>{{ Auth::user()->name }}</strong>Update Your Profile</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.password.update') }}" method="post">
                        @csrf            

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Current Password <span>*</span></label>
                            <input type="password" name="oldpassword" id="current_password" class="form-control"  >
                            
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">New Password <span>*</span></label>
                            <input type="password" name="password" id="password" class="form-control"  >
                           
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Confirm Password <span>*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
                            
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                    </form>
                </div>

            </div> <!-- End col-md-6 -->

        </div> <!-- End Row -->
       
    </div>
</div>




@endsection