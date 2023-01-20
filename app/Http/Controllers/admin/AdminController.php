<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Users;
use App\Models\Signage;
use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;

class AdminController extends Controller {
      public function index(){
        $count = User::where('status','Active')->count();
        
        $signages = Signage::get();
        $live = Signage::where('live_status','live')->count();

        $playlists =Playlist::get();
        $ply = Playlist::where('status','Active')->count();

        if(!Auth::user()){
        return redirect('/');
        }
        return view('admin.home',compact('count','live','signages','playlists','ply'));
      }

      public function profile(){
        $user= Auth::User();
        if(empty($user)){
          return redirect('/');
        }

        $users=User::where('id',$user->id)->first();
        $user->role=(!empty($users))?$user->role:'';
          return view('admin.profile',['users'=>$users]);
        }
    
      public function profile_update(Request $request,$id){
        $name=$request->name;
        $full_name=$request->full_name;
        
        if(empty($name)){
          return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
        }
        
        $user=User::where('id',$id)->first();
        if(empty($user)){
          return redirect()->back()->withErrors(['msg' => 'Can not empty user..']);
        }
    
        if(!empty($request->new_password)){
        $data_add['password']=bcrypt($request->new_password);
        }
    
        $image=array();
        if($files=$request->file('image')){
          foreach($files as $file){
            $files=$file->getClientOriginalName();
            $destinationPath = public_path('asset/uploads/images/');
            $file->move($destinationPath,$files);
            $uploadpath='asset/uploads/images/'.$files;
    
         }
        }
    
        $data_add['name']=$name;
        $data_add['full_name']=$full_name;
        $data_add['image']=$uploadpath;
        User::where('id', $id)->update($data_add);
        return redirect()->route('admin.profile')->with('success', 'Update success!!!');
        }
}