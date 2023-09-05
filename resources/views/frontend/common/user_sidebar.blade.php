<div class="col-md-2">
    <br>
    <img style="border-radius: 50%;"
    src="{{ !(empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path) : url('upload/admin_images/no_image.jpg') }}" 
    alt="" class="card-img-top" width="100%" height="100%">
    <br><br>
    <ul class="list-group list-group-flush">
        
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">My Orders</a>
        <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Return Orders</a>
        <a href="{{ route('cancel.orders') }}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Log Out</a>
        
    </ul>
</div> <!-- End col-md-2 -->