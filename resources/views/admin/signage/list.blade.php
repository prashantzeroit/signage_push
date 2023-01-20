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
div.dt-buttons{
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
.event-curser{
  pointer-events:none;
}
</style>
@endpush
@section('content')
  <div class="card" style="margin:10px;">
    <div class="card-header" style="background:#3B2C8B; color:white; margin:10px; padding:20px;">
      <h1 class="card-title">Signage Users</h1>
        <a href="http://127.0.0.1:8000/admin/signage/add">
          <button type="button" class="add">Add New Signage
            <i class="fa fa-plus-circle" style="margin-left:5px;"></i>
          </button>
        </a>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
        <thead>
          <tr>
            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Live</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">User_id</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Device</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Area</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Playlist</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Status</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Last Pinged</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">ACTION</th>
          </tr>
        </thead>
          <tbody>
            <?php $count=0;?>
              @foreach($signages as $vl)
            <?php $count = $count +1;?>
              <tr class="odd">
                <td class="dtr-control sorting_1" tabindex="0">{{ $count }}</td>
                @if(Helper::is_permission())
                <td>
                  <?php if($vl->live_status == 'offline'){?>
                    <a href="{{route('admin.signage.live',$vl->id)}}" class="status"><i class="fa fa-broadcast-tower" style="color:red"></i></a>
                    <?php }else
                    {?>
                    <a href="{{route('admin.signage.offline',$vl->id)}}" class="status"><i class="fa fa-broadcast-tower" style="color:#3B2C8B"></i></a>
                  <?php } ?>
                </td>
                @else
                <td>
                  <?php if($vl->live_status == 'offline'){?>
                    <a href="{{route('admin.signage.live',$vl->id)}}" class="status event-curser" disabled><i class="fa fa-broadcast-tower" style="color:red"></i></a>
                    <?php }else
                    {?>
                    <a href="{{route('admin.signage.offline',$vl->id)}}" class="status event-curser" disabled><i class="fa fa-broadcast-tower" style="color:#3B2C8B"></i></a>
                  <?php } ?>
                </td>
                @endif
                <td>{{ $vl->name }}</td>
                <td>{{ $vl->user_id }}</td>
                <td>{{ $vl->device }}</td>
                <td>{{ $vl->area }}</td>
                <td><a href="{{route('admin.signage.preview_signage',$vl->id)}}">Preview</a></td>
                @if(Helper::is_permission())
                <td>
                  <?php if($vl->status == 'deactive'){?>
                    <a href="{{route('admin.signage.active',$vl->id)}}" class="status">Active</a>
                      <?php } else{?>
                    <a href="{{route('admin.signage.deactive',$vl->id)}}" class="status">Deactive</a>
                  <?php } ?>
                </td>
                @else
                <td>
                  <?php if($vl->status == 'deactive'){?>
                    <a href="{{route('admin.signage.active',$vl->id)}}" class="status event-curser" disabled>Active</a>
                      <?php } else{?>
                    <a href="{{route('admin.signage.deactive',$vl->id)}}" class="status event-curser" disabled>Deactive</a>
                  <?php } ?>
                </td>
                @endif
                <td>{{ $vl->last_pinged }}</td>
                @if(Helper::is_permission())
                <td>
                  <a href="{{route('admin.signage.edit_schedule',$vl->id)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" color="#3B2C8B" fill="currentColor" class="bi bi-calendar2-plus" viewBox="0 0 16 16">
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                      <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM8 8a.5.5 0 0 1 .5.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5A.5.5 0 0 1 8 8z"/>
                    </svg></a>
                    <a href="{{route('admin.signage.edit',$vl->id)}}"><i class="fa fa-edit" style="font-size:24px; color:#3B2C8B"></i></a>
                    <a href="{{route('admin.signage.delete',$vl->id)}}"><i class="fa fa-trash" style="font-size:24px; color:#3B2C8B"></i></a>
                </td>
                @else
                <td>
                  <a href="{{route('admin.signage.edit_schedule',$vl->id)}}" class="event-curser" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" color="#3B2C8B" fill="currentColor" class="bi bi-calendar2-plus" viewBox="0 0 16 16">
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                      <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM8 8a.5.5 0 0 1 .5.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5A.5.5 0 0 1 8 8z"/>
                    </svg></a>
                    <a href="{{route('admin.signage.edit',$vl->id)}}" class="event-curser" disabled><i class="fa fa-edit" style="font-size:24px; color:#3B2C8B"></i></a>
                    <a href="{{route('admin.signage.delete',$vl->id)}}" class="event-curser" disabled><i class="fa fa-trash" style="font-size:24px; color:#3B2C8B"></i></a>
                </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
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