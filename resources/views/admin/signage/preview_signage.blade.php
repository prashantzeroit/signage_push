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
    display: none;
    margin-left:20px;
    background:#8C64D2;
    }
</style>
@endpush
@section('content')
    <div class="card" style="margin:10px;">
        <div class="card-header" style="background:#3B2C8B; color:white; margin:10px; padding:20px;">
            <h1 class="card-title">Playlist View</h1>
                </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                    <thead>
                        <tr>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NAME</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">SLIDER TIME</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">TYPE</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">ATTACHMENT</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(!empty($playlist))
                            @foreach($playlist as $vl)
                        <tr>
                            <td>{{$vl['name']}}</td>
                            <td>
                                @if($vl['type'] == 'mp4')
                                    <p class="mhdi_video_duration"></p>
                                @else
                                    {{$vl['slidertime']}}
                                @endif
                            </td>
                            <td>{{$vl['type']}}</td>
                            <td>
                                @if($vl['type'] == 'mp4')
                                    <video id="video_player" class="mhdividdur" width="250px" height="150px" controls>
                                        <source src="<?=asset('/').$vl['url'];?>" type="video/mp4">
                                        @else
                                    </video>
                                <a class="hyperbtn" target="__blank" href="{{asset($vl['url'])}}">
                                    <img src="<?=asset('/').$vl['url'];?>" class="imgfile" width="250px" height="150px">
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @endif
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

    var videos = document.querySelectorAll(".mhdividdur");
    var durationsEl = document.querySelectorAll(".mhdi_video_duration");
    for(let i = 0; i < videos.length; i++) {
    videos[i].onloadedmetadata = function() {
    var mzhours = Math.floor(videos[i].duration / 60);
    var mzminutes = Math.floor(videos[i].duration / 60);
    var mzseconds = Math.floor(videos[i].duration - (mzminutes * 60));
    durationsEl[i].innerHTML =mzhours+':'+mzminutes+':'+mzseconds;
    };
    }
</script>
@endpush