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
                    <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Name <span>*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" id="exampleInputEmail2" >
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" id="exampleInputEmail2" >
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Phone <span>*</span></label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" id="exampleInputEmail2" >
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">User Image <span>*</span></label>
                            <input type="file" name="profile_photo_path" id="email" class="form-control" id="exampleInputEmail2" >
                           
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