<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Signage;
use App\Models\Playlist;
use App\Models\User;
use App\Models\Term;
use App\Models\Edit_schedule;
use App\Models\Media_file;
use Illuminate\Http\Request;
use Hash;

class SignageController extends Controller{

    public function get_list(){
        $setdat['status']='error';
        $setdat['msg']='no data found...';

        $signages = Signage::orderBy('id','asc')->get();    
            if($signages->isEmpty()){
                $setdat['msg']='Signage is no record...';
                return Response::json($setdat);
            }
                $setdat['status']='success';
                $setdat['msg']='fetch data successfully...';
                $setdat['data']= $signages;
                return Response::json($setdat);
            }

    public function get_schedule(){
        $setdat['status']='error';
        $setdat['msg']='no data found...';

        $schedule=Edit_schedule::where('start_schedule','days')->orderBy('id','asc')->get();
            if($schedule->isEmpty()){
                $setdat['msg']='Signage is no record...';
                return Response::json($setdat);
            }
            $setdat['status']='success';
                $setdat['msg']='fetch data successfully...';
                $setdat['data']= $schedule;
                return Response::json($setdat);
    }


    public function store_schedule(){
        $setdat['status']='error';
        $setdat['msg']='no data found...';
    }
}