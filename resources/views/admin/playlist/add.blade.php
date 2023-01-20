@extends('admin.layouts.master')
@push("after-styles")
<style>
.paginationrow{
  float:right;
}
.paginationrow .hide{
  display: none;
  }
.paginationrow .finals .active{
  display: block;
  }
.tabsulbtn li {
  display: inline-block;
  width: 33%;
  background: #ccc;
  padding: 20px 0;
  text-align: center;
  color: #fff;
  font-size: 20px;
  }
.tabsulbtn li a{
  color:#fff;
  }
.tabsulbtn li.active{
  background: #3B2C8B;
  }
.row.table-content .sevicesec {
  display: none;
  }
.row.table-content .sevicesec.active {
  display: block;
  }
.card{
  height: 80px;
  background:#3B2C8B;
  color:white;
  margin:20px;
  }
.card h3{
  margin-top:20px;
  margin-left:25px;
  font-size:30px;
  }
.top-content-play{
  margin-top:20px;
  margin-left:30px;
  margin-bottom:20px;
  }
.tab_head{
  margin-left:20px;
  margin-right:15px;
  margin-top:-10px;
  }
.tab_head h3{
  margin-left:-10px;
  margin-top:30px;
  margin-bottom:40px;
  color:#869099;
  font-size:30px;
  }
.plyname{
  font-size:25px;
  color:#7E7E7E;
  }
  #drop-zone {
  width: 100%;
  min-height: 150px;
  border: 3px dashed rgba(0, 0, 0, .3);
  border-radius: 5px;
  font-family: Arial;
  text-align: center;
  position: relative;
  font-size: 20px;
  color: #7E7E7E;
  }
#drop-zone input {
  position: absolute;
  cursor: pointer;
  left: 0px;
  top: 0px;
  opacity: 0;
  }
#drop-zone.mouse-over {
  border: 3px dashed rgba(0, 0, 0, .3);
  color: #7E7E7E;
  }
#clickHere {
  display: inline-block;
  cursor: pointer;
  color: white;
  font-size: 17px;
  width: 150px;
  border-radius: 4px;
  background-color: #4679BD;
  padding: 10px;
  }
.fa-lg {
  font-size: 1.33333333em;
  line-height: 0.70em;
  vertical-align: 379%;
  margin-left: -23px;
  color: white;
}
img {
  vertical-align: middle;
  border-style: none;
  margin: 2px;
  }
.uploadfiles {
  display: inline-block;
  padding: 8px 11px;
  position: relative;
  }
.error{
  color:red;
  }
.filename{
  position: relative;
  margin: 8px 0;
  border: 3px dashed rgba(0, 0, 0, .3);
  min-height: 50px;
  }
.btn-cl{
  background:#6f42c1;
  color:white;
}
.btn-cl:hover{
  background:#3B2C8B;
  color:white;
}
.sevicesec{
  margin-top:60px;
  margin-bottom:60px;
  margin-right:20px;
  margin-left:20px;
}
</style>
@endpush
@section('content')
        <div class="card">
          <h3>Add New Playlist</h3>
        </div>

		    <div id="tabs" class="tab_head">    
          <div class="top-content-play">
            <h3>New Playlist</h3>
          </div>
        </div>
        
  <div class="container">
        <form method="post" id="storedetails" action="<?=route('admin.playlist.store');?>" enctype="multipart/form-data" class="">
        @csrf   
          <!---------tabs--------->
          <div class="row tabsrow">
            <ul class="col-sm-12 tabsulbtn">
              <li class="item active" data-count="1"><a class="hyper" href="#step1"><i class="fa fa-user"></i> &nbsp; Playlist Type </a></li>
              <li class="item" data-count="2"><a class="hyper" href="#step2"> Add Media </a></li>
              <li class="item" data-count="3"><a class="hyper" href="#step3"> Settings </a></li>
            </ul>
        </div>
         <!-----//----tabs--------->


        <div class="row table-content">
            <!---------step1---------> 
          <div class="col-sm-12 sevicesec active" id="step1">
            <div class="form-group">
              <div class="form-row">
                <div class="col-sm-2">
                  <label for="Playlist Name" class="plyname">Playlist Name :</label>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" placeholder="Please Enter Uniuqe Playlist name">
                    @if($errors->any())
                    <div class="error">    
                      {{$errors->first()}}
                        </div>
                        @endif
                      @if (Session::has('success'))
                    {!! Session::get('success') !!}
                  @endif  
                </div>
              </div>
            </div>
          </div>
          <!----/-----step1--------->

          <!---------step2--------->
          <div class="col-sm-12 sevicesec"  id="step2">
            <div class="form-group">
              <center>   
                <div id="drop-zone">
                  <p>Drop files here...</p>
                    <div id="clickHere">or click here.. <i class="fa fa-upload"></i>
                      <input type="file" class="playlistfileinput" name="image[]" id="file" accept="audio/*,video/*, image/png, image/peng, image/jpeg, image/jpg, image/gif" multiple />
                    </div>
                  </div>
                </center>
              <div id='filename' class="filename"></div>
            </div>
          </div>
            <!-----/----step2--------->

              <!---------step3--------->
          <div class="col-sm-12 sevicesec"  id="step3">
              <div class="form-group">
                <div class="form-row">
                  <div class="col-sm-12">
                    <label for="">Slide data in secounds (0)</label>
                      </div>
                    <div class="col-sm-12">
                  <input type="number" class="form-control" name="slidertime" value="5">
                </div>
              </div>
            </div>
          </div>
              <!-----/----step3--------->
      </div>

         <!---------paginationrow--------->
        <div class="row paginationrow">
            <ul class="col-sm-12 pagepdbtnsec">
            <li class="btn btn-cl pagepdbtn prevbtn disabled">
            <a class="btn btn-cl" href="#">Preview</a>
            </li>
            <li class="btn btn-cl pagepdbtn nextbtn">
            <a class="btn btn-cl" href="#">next</a>
            </li>
            <li class="btn btn-cl hide finals">
            <button class="btn btn-cl sevsdbtn" type="submit">save</button>
            </li>
            </ul>
        </div>
         <!-----//----paginationrow--------->
      </form>

</div>

</div>
@endsection
@push('after-scripts')
<script>
    $(document).ready(function(){
    /***************** tabsulbtn start ******************************/
      $("body").on('click','ul.tabsulbtn li a',function(e){
        e.preventDefault();
        const self=$(this);
        const parents=self.parent();
        const count=parents.data('count');
        const showpageId=$(this).attr('href');

      $('ul.tabsulbtn li').removeClass('active');
        parents.addClass('active');

        $('.row.table-content .sevicesec').removeClass('active');
        $(showpageId).addClass('active');

        if(count == '1'){
            $('.pagepdbtnsec li.prevbtn').addClass('disabled');
        }else{

            $('.pagepdbtnsec li').removeClass('disabled');
        }

        if(count == '3'){     
            $('.pagepdbtnsec li.nextbtn').addClass('hide');
            $('.pagepdbtnsec li.finals').removeClass('hide');
        }else{
            $('.pagepdbtnsec li.finals').addClass('hide');
            $('.pagepdbtnsec li.nextbtn').removeClass('hide');
        }
      });
    /***************** tabsulbtn end ******************************/
    /***************** pre pagepdbtnsec start ******************************/
    $("body").on('click','ul.pagepdbtnsec li.prevbtn',function(e){
        e.preventDefault();
        const self=$(this);
        const parents=self.parent();
        const countnum=($('ul.tabsulbtn li.active').data('count'))?$('ul.tabsulbtn li.active').data('count'):1;
        const count=countnum-1;

        if(self.hasClass('disabled') == false){
          const showpageId= $('ul.tabsulbtn li:nth-child('+count+') a').attr('href');

          $('ul.tabsulbtn li').removeClass('active');
          if(countnum == '1'){
          $('ul.tabsulbtn li:nth-child(1)').addClass('active');
          }else{
          $('ul.tabsulbtn li:nth-child('+count+')').addClass('active');
          }

        if(count == '3'){
          $('ul.pagepdbtnsec li.nextbtn').addClass('hide');
          $('ul.pagepdbtnsec li.finals').removeClass('hide');
          }else{

          $('ul.pagepdbtnsec li.finals').addClass('hide');
          $('ul.pagepdbtnsec li.nextbtn').removeClass('hide');

        if(count == '1'){
            $('ul.pagepdbtnsec li:nth-child(1)').addClass('disabled');
          }
        }

        $('.row.table-content .sevicesec').removeClass('active');
        $(showpageId).addClass('active');
        }   
      });
    /*****************  pre  pagepdbtnsec end ******************************/
    /***************** next pagepdbtnsec start ******************************/
    $("body").on('click','ul.pagepdbtnsec li.nextbtn',function(e){
        e.preventDefault();
        const self=$(this);
        const parents=self.parent();
        const countnum=($('ul.tabsulbtn li.active').data('count'))?$('ul.tabsulbtn li.active').data('count'):1;
        const count=countnum+1;
        const showpageId= $('ul.tabsulbtn li:nth-child('+count+') a').attr('href');
       
        $('ul.tabsulbtn li').removeClass('active');
        if(count>1){
          $('ul.pagepdbtnsec li:nth-child(1)').removeClass('disabled');
          $('ul.pagepdbtnsec li.nextbtn').addClass('hide');
          $('ul.pagepdbtnsec li.finals').removeClass('hide');
          }else{
          $('ul.pagepdbtnsec li:nth-child(1)').addClass('disabled');
          }

        if(countnum == '3'){
          $('ul.tabsulbtn li:nth-child(3)').addClass('active');
          }else{
          $('ul.tabsulbtn li:nth-child('+count+')').addClass('active');
          }
       
        if(count == '3'){
          $('ul.pagepdbtnsec li.nextbtn').addClass('hide');
          $('ul.pagepdbtnsec li.finals').removeClass('hide');
        }else{
          $('ul.pagepdbtnsec li.finals').addClass('hide');
          $('ul.pagepdbtnsec li.nextbtn').removeClass('hide');
          }

        $('.row.table-content .sevicesec').removeClass('active');
        $(showpageId).addClass('active');
      });
    /*****************  next pagepdbtnsec end ******************************/
});
  //Image ajax upload script
  $(document).ready(function(){
    var finalFiles = {};
    var dropZoneId = "drop-zone";
    var buttonId = "clickHere";
    var mouseOverClass = "mouse-over";
    var dropZone = $("#" + dropZoneId);
    var inputFile = dropZone.find("input.playlistfileinput");

  $(function() {
    var ooleft = dropZone.offset().left;
    var ooright = dropZone.outerWidth() + ooleft;
    var ootop = dropZone.offset().top;
    var oobottom = dropZone.outerHeight() + ootop;

  document.getElementById(dropZoneId).addEventListener("dragover", function(e) {
    e.preventDefault();
    e.stopPropagation();
    dropZone.addClass(mouseOverClass);
    var x = e.pageX;
    var y = e.pageY;
    inputFile.offset({
    top: y - 15,
    left: x - 100
  });
  }, true);
  if (buttonId != "") {
    var clickZone = $("#" + buttonId);
    var oleft = clickZone.offset().left;
    var oright = clickZone.outerWidth() + oleft;
    var otop = clickZone.offset().top;
    var obottom = clickZone.outerHeight() + otop;
  $("#" + buttonId).mousemove(function(e) {
    var x = e.pageX;
    var y = e.pageY;      
    inputFile.offset({
    top: y - 15,
    left: x - 160
  });
  });
  }
  document.getElementById(dropZoneId).addEventListener("drop", function(e){
    $("#" + dropZoneId).removeClass(mouseOverClass);
    }, true);
    inputFile.on('change', function(e){
    finalFiles = {};
    $('#filename').html("");
    var fileNum = this.files.length,
    initial = 0,
    counter = 0;

  $.each(this.files,function(idx,f){
  var reader = new FileReader();
    reader.onload = function (e) {
    if(f.type.match("image.*")) {
    var html = '<div class="uploadfiles" id="file_'+ idx +'"><img width="150px" height="150px" src="'+e.target.result+'" data-file="'+f.name+'" class="selFile"><span class="fa fa-times-circle fa-lg closeBtn removeimgbt" title="remove"></span></div>';
    }else if(f.type.match("video.*")){
    var html = '<div class="uploadfiles videofiles" id="file_'+ idx +'"><video class="selFile" width="150px" height="150px" controls name="media"><source src="'+e.target.result+'" type="video/mp4"></video><span class="fa fa-times-circle fa-lg closeBtn removeimgbt" title="remove"></span></div>';
    }else{
    var html = '';
    }
    $('.filename').append(html);
    }
    reader.readAsDataURL(f); 
  });
  })
  $(document).on("click",".removeimgbt",function(e){
    inputFile.val('');
    var jqObj = $(this);
    var container = jqObj.closest('div');
    var index = container.attr("id").split('_')[1];
    container.remove(); 

    delete finalFiles[index];
    console.log(finalFiles);
  });
  });
  });
  //end Image ajax upload script
</script>
@endpush
