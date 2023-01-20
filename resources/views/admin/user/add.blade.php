@extends('admin.layouts.master')
@section('content')
    <div class="card card-primary" style="margin:10px">
        <div class="card-header" style="background:#3B2C8B;color:white; margin:10px;">
            <h3 class="card-title">Add New Users</h3>
          </div>
          <form method="post" action="<?=route('admin.user.store')?>" enctype="multipart/form-data">
          @csrf  
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="" require>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="" require>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Full Name</label>
              <input type="text" class="form-control" name="full_name" id="exampleInputEmail1" placeholder="" require>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="" require>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password" id="exampleInputPassword1" placeholder="" require>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Role</label>
              @if(Auth()->user()->role == 'admin')
              <select class="form-control" name="role" require>
                <option value="">Please select role</option>
                <option value="admin">admin</option>
                <option value="user">user</option>
              </select>
              @else
                <select class="form-control" name="role" require>
                <option value="user">user</option>
              @endif
            </div>
            <div class="form-group">
              <label for="exampleInputimage1">Image</label>
              <input type="file" class="form-control" name="image[]" id="exampleInputImage1" placeholder="" require>
            </div>
          </div>
            <!-- /.card-body -->
          <div class="card-footer" style="float:right;">
            <button type="submit" class="btn btn" style="background:#3B2C8B;color:white;">Submit</button>
          </div>
        </form>
      </div>
    </div>
@endsection