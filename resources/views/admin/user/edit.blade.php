@extends('admin.layouts.master')
@section('content')
      <div class="card card-primary"style="margin:10px;">
        <div class="card-header"style="background:#3B2C8B;color:white; margin:10px;">
          <h3 class="card-title">Update Your Data Here</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?=route('admin.user.update',$users->id);?>" enctype="multipart/form-data">
          <div class="card-body">
              <div class="form-group">
              <label for="exampleInputName1">NAME</label>
              <input type="name" name="name" class="form-control" id="exampleInputName1" placeholder="Enter name" value="{{$users->name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputContact1">FULL NAME</label>
              <input type="text" name="full_name" class="form-control" id="exampleInputContact1" placeholder="Enter Full Name" value="{{$users->full_name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">EMAIL ADDRESS</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" value="{{$users->email}}">
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
              <label for="exampleInputParentuser1">PARENT ID</label>
              <input type="text" name="parent_id" class="form-control" id="exampleInputParentuser1" placeholder="Enter Parent User Id" value="{{$users->parent_id}}">
            </div>
            <div class="form-group">
              <label for="exampleInputName1">IMAGE</label>
              <input type="file" name="image" class="form-control" id="exampleInputName1" placeholder="" value="{{$users->image}}">
            </div>
          </div>   
          <div class="card-footer" style="float:right">
            <button type="submit" class="btn btn"style="background:#3B2C8B;color:white;">Submit</button>
          </div>
        </form>
      </div>
    </div>
@endsection