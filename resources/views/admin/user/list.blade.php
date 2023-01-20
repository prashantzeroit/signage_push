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
  margin-left:0px;
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
  padding:8px;
  }
.ico{
  float:right;
  }
body{
  font-family: Arial;
  }
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
  }
.tab button:hover{
  text-decoration:underline 4px solid #8C64D2;
  transition:1s;
  }
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  }
</style>
@endpush
@section('content')
    <!-- table header...... -->
    <div class="card" style="margin:10px">
      <div class="card-header" style="background:#3B2C8B; color:white; margin:10px;">
        <h1 class="card-title">List of Users</h1>
          <a href="http://127.0.0.1:8000/admin/user/add"><button type="button" class="add">Add New User<i class="fa fa-plus-circle" style="margin-left:5px;"></i></button></a>
            </div>
        <!--end table header...... -->
        <!-- tab links table...... -->
        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'Paris')" id="defaultOpen">Admins</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Users</button>
        </div>
    </div>
    <!--end tab links table...... -->

      <div id="Paris" class="tabcontent">
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
            <thead>
              <tr>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">IMAGE</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NAME</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">EMAIL</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">FULL NAME</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">ROLE</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">PARENT_ID</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">STATUS</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">ACTION</th>
              </tr>
            </thead>
          <tbody>
                <?php $count=0;?>
                @foreach($admin as $vl)
                <?php $count = $count +1;?>

              <tr class="odd">
                <td class="dtr-control sorting_1" tabindex="0">{{ $count }}</td>
                <td><img src="{{ $vl->image }}" height="70px" width="70px"></td>
                <td>{{ $vl->name }}</td>
                <td>{{ $vl->email }}</td>
                <td>{{ $vl->full_name }}</td>
                <td>{{ $vl->role }}</td>
                <td>{{ $vl->parent_id }}</td>
                <td>
                <?php if($vl->status == 'deactive'){?>
                  <a href="{{route('admin.user.active',$vl->id)}}" class="status" style="color:#34eb7a;">Active</a>
                <?php } else{?>
                  <a href="{{route('admin.user.deactive',$vl->id)}}" class="status" style="color:black;">Deactive</a>
                <?php }  ?>
                </td>
                <td>
                <a href="{{route('admin.user.edit',$vl->id)}}"><i class="fa fa-edit" style="font-size:24px; color:#3B2C8B"></i></a>
                <a href="{{route('admin.user.delete',$vl->id)}}"><i class="fa fa-trash" style="font-size:24px; color:#3B2C8B"></i></a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      
      <div id="Tokyo" class="tabcontent">
        <div class="card-body">
          <table id="example3" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
            <thead>
              <tr>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">IMAGE</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NAME</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">EMAIL</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">FULL NAME</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">ROLE</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">PARENT_ID</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">STATUS</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">ACTION</th>
              </tr>
            </thead>
          <tbody>
                <?php $count=0;?>
                @foreach($users as $vl)
                <?php $count = $count +1;?>
              <tr class="odd">
                <td class="dtr-control sorting_1" tabindex="0">{{ $count }}</td>
                <td><img src="{{ $vl->image }}" height="70px" width="70px"></td>
                <td>{{ $vl->name }}</td>
                <td>{{ $vl->email }}</td>
                <td>{{ $vl->full_name }}</td>
                <td>{{ $vl->role }}</td>
                <td>{{ $vl->parent_id }}</td>
                <td>
                <?php if($vl->status == 'deactive'){?>
                  <a href="{{route('admin.user.active',$vl->id)}}" class="status" style="color:#34eb7a;">Active</a>
                <?php } else{?>
                  <a href="{{route('admin.user.deactive',$vl->id)}}" class="status" style="color:black;">Deactive</a>
                <?php }  ?>
                </td>
                <td>
                <a href="{{route('admin.user.edit',$vl->id)}}"><i class="fa fa-edit" style="font-size:24px; color:#3B2C8B"></i></a>
                <a href="{{route('admin.user.delete',$vl->id)}}"><i class="fa fa-trash" style="font-size:24px; color:#3B2C8B"></i></a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection
@push("after-scripts")
<script>
  //tab script........
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
      tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
      document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }
      document.getElementById("defaultOpen").click();
  //End tab script........
  //Print buttons script........
  $(document).ready(function () {
        $("#example1").DataTable({
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        
        $("#example2").DataTable({
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        
        $("#example3").DataTable({
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
  //End print buttons script........
</script>
@endpush