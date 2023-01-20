@extends('admin.layouts.master')
@section('content')
<br>
    <div class="card card-primary" style="margin:10px">
        <div class="card-header"style="background:#3B2C8B;color:#fff">
          <h3 class="card-title">Edit Profile</h3>
        </div>
        <form method="post" action="<?=route('admin.profile',$users->id);?>" enctype="multipart/form-data">
      <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" class="form-control" name="name" value="{{$users->name}}" id="exampleInputEmail1" placeholder="" require>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="name" value="{{$users->username}}" id="exampleInputEmail1" placeholder="" require>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" value="{{$users->email}}" id="exampleInputEmail1" placeholder="" require>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <input type="file" class="form-control" name="image" value="{{$users->image}}" id="exampleInputEmail1" placeholder="" require>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">New Password</label>
            <input type="password" class="form-control" name="new_password" value="{{$users->new_password}}" id="exampleInputEmail1" placeholder="" require>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Role</label>
            <input type="text" class="form-control" name="role" value="{{$users->role}}" id="exampleInputEmail1" readonly>
          </div>
          <div class="card-footer" style="float:right">
            <button type="cancle" name="cancle" value="cancle" class="btn btn-danger">Cancle</button>
            <button type="submit" name="submit" value="submit" class="btn btn" style="background:#3B2C8B;color:#fff">Save</button>
      </div>
        </form>
      </div>
    </div>
  </div>
@endsection