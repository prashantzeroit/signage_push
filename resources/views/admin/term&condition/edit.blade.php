@extends('admin.layouts.master')
@section('content')
<div class="card card-primary" style="margin:10px">
  <div class="card-header" style="background:#3B2C8B;color:#fff; margin:5px;">
    <h3 class="card-title">Add New T&C</h3>
  </div>
    <form method="post" action="<?=route('admin.term&condition.update',$terms->id);?>" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name="name" value="{{$terms->name}}" id="exampleInputEmail1" placeholder="" require>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Content</label>
          <input type="text" class="form-control" name="pin" value="{{$terms->content}}" id="exampleInputEmail1" placeholder="" require>
        </div>
        <div class="card-footer" style="float:right">
          <button type="submit" name="submit" value="submit" class="btn btn" style="background:#3B2C8B;color:#fff;">Save</button>
      </div>
    </form>
</div>
</div>
</div>
@endsection