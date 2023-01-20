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
    margin-left:20px;
    margin-top:-5px;
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
    margin:5px;
    }
body {
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
    text-decoration:underline 4px solid #9256c4;
    transition:1s;
    }
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
    }
.event-curser{
    pointer-events:none;
}
</style>
@endpush
@section('content')
    <div class="card" style="margin:10px">
        <div class="card-header" style="background:#3B2C8B; color:white; margin:5px;">
            <h1 class="card-title">Manage Playlist</h1>
                <a href=""><button type="button" class="add">Delete Drafts<i class="fa fa-trash" style="margin-left:5px;"></i></button></a>
                <a href="{{route('admin.playlist.add')}}"><button type="button" class="add">Add New Playlist<i class="fa fa-plus-circle" style="margin-left:5px;"></i></button></a>
            </div>
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Active Playlist</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">Draft Playlist</button>
            </div>
                  <!-- tab content first -->
            <div id="London" class="tabcontent">
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Sr.No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Playlist Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Playlist Type</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Created By</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">priview</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">ACTION</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                        <?php $count=0;?>
                                            @foreach($playlists as $vl)
                                        <?php $count = $count +1;?>
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $count }}</td>
                                        <td>{{ $vl->name }}</td>
                                        <td>{{ $vl->type }}</td>
                                        <td>{{ $vl->created_by }}</td>
                                        <td>{{ $vl->status }}</td>
                                        <td><a href="{{route('admin.media.list',$vl->id)}}">Preview</a></td>
                                        @if(Helper::is_permission())
                                        <td>
                                            <a href="{{route('admin.playlist.edit',$vl->id)}}"><i class="fa fa-edit" style="font-size:24px; color:green"></i></a>
                                            <a href="{{route('admin.playlist.delete',$vl->id)}}"><i class="fa fa-trash" style="font-size:24px; color:red"></i></a>
                                        </td>
                                        @else
                                        <td>
                                            <a href="{{route('admin.playlist.edit',$vl->id)}}" class="event-curser" disabled><i class="f11a fa-edit" style="font-size:24px; color:green"></i></a>
                                            <a href="{{route('admin.playlist.delete',$vl->id)}}" class="event-curser" disabled><i class="fa fa-trash" style="font-size:24px; color:red"></i></a>
                                        </td>
                                        @endif
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                  <!-- tab content first -->
            <div id="Paris" class="tabcontent">
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                            <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Sr.No</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Playlist Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Playlist Type</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Created By</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Status</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">priview</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">ACTION</th>
                        </tr>
                            </thead>
                        <tbody>
                            <?php $count=0;?>
                            @foreach($playlists as $vl)
                            <?php $count = $count +1;?>
                        <tr class="odd">
                            <td class="dtr-control sorting_1" tabindex="0">{{ $count }}</td>
                            <td>{{ $vl->name }}</td>
                            <td>{{ $vl->type }}</td>
                            <td>{{ $vl->created_by }}</td>
                            <td>{{ $vl->status }}</td>
                            <td>{{ $vl->preview }}</td>
                            <td>
                            <a href="{{route('admin.playlist.edit',$vl->id)}}"><i class="fa fa-edit" style="font-size:24px; color:green"></i></a>
                            <a href="{{route('admin.playlist.delete',$vl->id)}}"><i class="fa fa-trash" style="font-size:24px; color:red"></i></a>
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
        </div>
@endsection
@push('after-scripts')
<script>
    // print btn script
$(document).ready(function () {
    $("#example1").DataTable({
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    })
    .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example2").DataTable({
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    })
    .buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
});
    //tab script...
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
</script>
@endpush