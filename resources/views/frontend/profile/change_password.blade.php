@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img style="border-radius: 50%;"
                 src="{{ !(empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path) : url('upload/admin_images/no_image.jpg') }}" 
                 alt="" class="card-img-top" width="100%" height="100%">
                 <br><br>
                <ul class="list-group list-group-flush">

                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Log Out</a>
                   
                </ul>
            </div> <!-- End col-md-2 -->

            <div class="col-md-2">

            </div> <!-- End col-md-2 -->

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