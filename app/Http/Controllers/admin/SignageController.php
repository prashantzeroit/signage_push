<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Signage;
use App\Models\Playlist;
use App\Models\Media_file;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Edit_schedule;
use Illuminate\Http\Request;
class SignageController extends Controller{

    public function add(){
        return view('admin.signage.add');
    }
       
    public function store(Request $request){
        $user_id=Auth::user()->id;
        $name=$request->name;
        $area=$request->area;
        $expiry=$request->expiry;

        $data_add=['name'=>$request->name,
        'area'=>$area,
        'user_id'=>$user_id,
        'expiry'=>$expiry,
    ];    
    if(Signage::insert($data_add)){
        return redirect()->route('admin.signage.list')->with('success','add user success..');
    }
    return redirect::back()->witherrors(['msg' => 'add user failed']);
    }
    
    public function signage_list(){
        $signages = Signage::orderBy('id', 'asc')->get();
        return view('admin.signage.list',['signages'=>$signages]);
    }

    public function signage_edit($id){
        $signages = Signage::where('id', $id)->first();
        return view('admin.signage.edit',['signages'=>$signages]);
        
    }
    
    public function signage_update(Request $request,$id){
        $name=$request->name;
        $signages = Signage::where('id',$id)->first();
    
        $data_add['name']=$name;
        Signage::where('id',$id)->update($data_add);
        return redirect()->route('admin.signage.list');
        
    }
    public function signage_delete($id){
        $signages = Signage::where('id',$id)->firstorfail()->delete();
        return back()->with('success','signage delete success');
    }
    public function live($id){
        if(Signage::where('id',$id)->update(['live_status'=>'live'])){
            return redirect()->to('/admin/signage/list')->with('success','offline....');
        }else{
            return redirect()->back()->withErrors(['msg'=>'can`t offline']);
        }
    }
    public function offline($id){
        if(Signage::where('id',$id)->update(['live_status'=>'offline'])){
            return redirect()->to('/admin/signage/list')->with('success','offline....');
        }else{
            return redirect()->back()->withErrors(['msg'=>'can`t offline']);
        }
    }

    public function active($id){
        if(Signage::where('id',$id)->update(['status'=>'active'])){
            return redirect()->to('/admin/signage/list')->with('success','User active....');
        }else{
            return redirect()->back()->withErrors(['msg'=>'can`t active']);
        }
        }
    public function deactive($id){
        if(Signage::where('id',$id)->update(['status'=>'deactive'])){
            return redirect()->to('/admin/signage/list')->with('success','user deactive....');
        }else{
            return redirect()->back()->withErrors(['msg'=>'can`t user deactive']);
        }
        }

    public function edit_schedule($id){
        $playlists=Playlist::get();
        $users=User::get();
        $signages=Signage::where('id',$id)->first();
        $schedule=Edit_schedule::where('signage_id',$id)->get();
        return view('admin.signage.edit_schedule', compact('schedule','signages','playlists','users'));
    }

    public function edit_update(Request $request,$id){
        $user_id=Auth::user()->id;
        $playlist_id=$request->playlist_id;
        $schedule_id=$request->schedule_id;
        $select_days=$request->select_days;
        $start_schedule=$request->start_schedule;
        $daterange=$request->daterange;

        $signages=Signage::where('id',$id)->first();
        foreach($playlist_id as $ky => $vl){
            $data_add=['playlist_id'=>$vl,
            'user_id'=>$id,
            'signage_id'=>$id,
            'select_days' => $select_days,
            'start_schedule' => $start_schedule,
            'daterange' => $daterange,
        ];
        $schedule=Edit_schedule::where('id',$schedule_id[$ky])->first();
        if(!empty($schedule)){
            Edit_schedule::where('id',$schedule->id)->update($data_add);
        }else{
            Edit_schedule::insert($data_add);
        }
        }
        return redirect()->to('admin/signage/list')->with('success','Update Save....');
    }

    public function preview_signage($id){
        $signages=Edit_schedule::with('playlist')->where('signage_id',$id)->get();    

        $playlist=[];
        if(!$signages->isEmpty()){
             foreach($signages as $vl){
                if(!empty($vl->playlist)):
                $playlist_list[]=$vl->playlist->id;
                endif;
            }
        }
       
       if(!empty($playlist_list)){
        $media_data=Media_file::whereIn('playlist_id',$playlist_list)->where('playlist_type','playlist')->get();
        
        if(!$media_data->isEmpty()){
            foreach($media_data as $vl){
                $pls=Playlist::where('id',$vl->playlist_id)->first();
                $playlist[]=[
                'id'=>$vl->id,
                'playlist_id'=>$vl->playlist_id,
                'name'=>$pls->name,
                'slidertime'=>$pls->slidertime,
                'media_id'=>$vl->id,
                'url'=>$vl->url,
                'type'=>$vl->type,
                ];
                }
            }
       }
    
    return view('admin.signage.preview_signage',compact('playlist'));
    }

}