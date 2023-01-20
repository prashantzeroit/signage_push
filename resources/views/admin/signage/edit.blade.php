@extends('admin.layouts.master')
@section('content')
<div class="card card-primary" style="margin:10px">
              <div class="card-header" style="background:#3B2C8B;color:#fff; margin:10px">
                <h3 class="card-title">Add New Signage</h3>
              </div>
              <form method="post" action="<?=route('admin.signage.update',$signages->id);?>" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Signage Name</label>
                    <input type="text" class="form-control" name="name" value="{{$signages->name}}" id="exampleInputEmail1" placeholder="" require>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputarea1">Area Installed</label>
                    <input type="text" class="form-control" name="area" value="{{$signages->area}}" id="exampleInputarea1" placeholder="" require>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date of Expiry </label>
                    <input type="date" class="form-control" name="expiry" value="{{$signages->expiry}}" id="exampleInputEmail1" placeholder="" require>
                  </div>                  
                </div>
                <div class="card-footer" style="float:right">
                  <button type="submit" name="submit" value="submit" class="btn btn" style="background:#3B2C8B;color:#fff;">Save</button>
                </div>
              </form>
            </div>
@endsection