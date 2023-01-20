@extends('admin.layouts.master')
@push('after-styles')
<style>
.card-body{
  background:#fff;  
  border-radius:10px;  
}
.card-category{
  float:left;
  position: absolute;
  color:#7E7E7E;
  font-size:30px;
  margin-top:-10px;
}
.dotlogo{  
  margin-left:300px;
}
hr{
  width: 310px;
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: 1;
  color: white;
  border-top: 1px solid rgb(210, 210, 210);
  }
.head{
  float:left;
  font-size:40px;
  color:#8C64D2;
}
.status{
  text-align:center;
  color:#7E7E7E;
}
.stats p{
  font-size:25px;
}
.table-view{
  color:#7E7E7E;
  font-size:18px;
}
.table-head{
  color:;
  font-size:18px;
}
.btn-status{
  border-radius:20px;
  width:100px;
  height:35px;
  font-size:16px;
  background:#8C64D2;
  border:none;
}
.btn-statuss{
  border-radius:20px;
  width:100px;
  height:35px;
  font-size:16px;
  background:#c1bbfa;
  border:none;
}
.card-footer {
  padding: 0.75rem 1.25rem;
  background-color:white;
  border-top: 0 solid rgba(0,0,0,.125);
}
</style>
@endpush
@section('content')
      <!-- Content Header (Page header) -->
      <div class="content-header" style="margin:20px;">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-sm-8">
            <div class="card card-stats elevation-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">ACTIVE</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="dotlogo" width="24" height="24" fill="#7E7E7E" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                          <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                      <hr>
                    </div>
                  </div>
                </div>      
                  <div class="card-footer ">
                    <div class="stats">
                      <i class="head fa fa-user-circle"></i>
                      <p class="status"> <?=($count);?> Active Accounts</p> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- 2nd -->
          <!-- <div class="row"> -->
        <div class="col-lg-4 col-md-8 col-sm-8">
          <div class="card card-stats elevation-3">
            <div class="card-body">
              <div class="row">
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">SIGNAGE</p>
                      <svg xmlns="http://www.w3.org/2000/svg" class="dotlogo" width="24" height="24" fill="#7E7E7E" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                      </svg>
                    <hr>
                  </div>
                </div>
              </div>      
                <div class="card-footer ">
                  <div class="stats">
                  <i style="font-size:40px" class="fa head">&#xf24d;</i>
                    <p class="status"> <?=($live)?> Active Signage</p> 
                  </div>
                </div>
              </div>
            </div>
          </div>
      <!-- 3rd -->
      <!-- <div class="row"> -->
      <div class="col-lg-4 col-md-8 col-sm-8">
        <div class="card card-stats elevation-3">
          <div class="card-body">
            <div class="row">
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category"> PLAYLIST</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="dotlogo" width="24" height="24" fill="#7E7E7E" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                      <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                  <hr>
                </div>
              </div>
            </div>      
              <div class="card-footer">
                <div class="stats">
                  <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-play-btn head" viewBox="0 0 16 16">
                  <path d="M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                  </svg>
                <p class="status"><?=($ply);?>&nbsp; Active Playlist</p> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats elevation-3">
              <div class="card-body">
                <div class="row">
                <table class="table table-hover mb-0">
                <thead>
                  <tr class="table-head">
                    <th>Name</th>
                    <th>Device Id</th>
                    <th>Live</th>
                    <th>Status</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach($signages as $vl)
                    <tr class="table-view">
                      <td>{{$vl->name}}</td>
                      <td>{{$vl->device}}</td>
                      <td><?php if($vl->live_status == 'offline'){?>
                          <i class="fa fa-broadcast-tower" style="color:red"></i>
                            <?php }else {?>
                          <i class="fa fa-broadcast-tower" style="color:#3B2C8B"></i>
                        <?php } ?> 
                      </td>
                      <td>
                      <?php if($vl->status == 'deactive'){?>
                        <button class="btn-status" style="color:#fff;">Active</button>
                          <?php } else{?>
                            <button class="btn-statuss"style="color:#fff;">Deactive</button>
                          <?php }  ?>
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