<?php
namespace App\Helpers;
use App;
use App\Models\Language;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Auth;
use GeoIP;


    class Helper{

    static function is_permission(){
        if(Auth::check()){
            
        if(Auth::user()->role == 'admin'){
            return true;
            }
        }
        return false;
        }
    }