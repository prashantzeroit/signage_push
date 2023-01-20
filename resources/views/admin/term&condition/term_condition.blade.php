@extends('admin.layouts.master')
@push('after-styles')
<style>
div.dataTables_wrapper div.dataTables_length label {
  font-weight: normal;
  float:left;
  white-space: nowrap;
  }
div.dataTables_wrapper div.dataTables_filter label {
  font-weight: normal;
  white-space: nowrap;
  float:right;
  }
div.dataTables_wrapper div.dt-buttons.btn-group div.btn-group:last-child {
  border-top-left-radius: 0px !important;
  display:none;
  border-bottom-left-radius: 0px !important;
  }
div.dt-buttons {
  position: initial;
  margin-left:30px;
  margin-top:-10px;
  text-align:center;
  }
.btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
  border-top-radius: 0;
  border-bottom-radius: 0;
  margin-left:20px;
  background:#8C64D2;
  }
.btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle):hover{
  background:#3B2C8B;
  }
.add{
  background:#8C64D2;
  color:white;
  border:none;
  float:right;
}
.ico{
  float:right;
}
</style>
@endpush
@section('content')
    <div class="card" style="margin:15px">
    <div class="card-header" style="background:#3B2C8B; color:white; margin:5px;">
    <h1 class="card-title">Term & Conditions</h1>
    <a href="http://127.0.0.1:8000/admin/term&condition/add">
    <button type="button" class="add">Add New T&C<i class="fa fa-plus-circle" style="margin-left:5px;">
    </i></button></a>
    </div>

    <div class="card-body">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
    <div class="row">
    <div class="col-sm-12">
    <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
    <thead>
    <tr>
    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Sr.No</th>
    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Content</th>
    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Create</th>
    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Update</th>
    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">ACTION</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count=0;?>
    @foreach($terms as $vl)
    <?php
    $count = $count +1;
    ?>
    <tr class="odd">
    <td class="dtr-control sorting_1" tabindex="0">{{ $count }}</td>
    <td>{{ $vl->name }}</td>
    <td>{{ $vl->content }}</td>
    <td>{{ $vl->created_at }}</td>
    <td>{{ $vl->updated_at }}</td>
    <td>
    <a href="{{route('admin.term&condition.edit',$vl->id)}}"><i class="fa fa-edit" style="font-size:24px; color:#3B2C8B"></i></a>
    <a href="{{route('admin.term&condition.delete',$vl->id)}}"><i class="fa fa-trash" style="font-size:24px; color:#3B2C8B"></i></a>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
@endsection
@push('after-scripts')
<script>
  $(document).ready(function () {
    $("#example1").DataTable({
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
    .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush