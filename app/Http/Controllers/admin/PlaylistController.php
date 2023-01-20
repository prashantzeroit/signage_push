<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Playlist;
use App\Models\Media_file;
use App\Models\Edit_schedule;
use Illuminate\Http\Request;

class PlaylistController extends Controller{

    public function add(){
        return view('admin.playlist.add');
    }

    public function play_list(){
        $playlists = Playlist::orderBy('id', 'asc')->get();
        return view('admin.playlist.list',['playlists'=>$playlists]);
    }
    
    public function media_list($id){
        $playlists = Playlist::where('id',$id)->get();
        $media = Media_file::where('playlist_id', $id)->get();
        return view('admin.media.list',['media'=>$media,'playlists'=>$playlists]);
    }

    public function store(Request $request){
    
    $user_id=Auth::user()->id;
    $name=$request->input('name');
    $slidertime=(!empty($request->input('slidertime')))?$request->input('slidertime'):'0';
    $playlist=Playlist::where('name',$name)->first();
    
    if(!empty($playlist)){
        return redirect()->back()->withErrors(['msg' => 'Please enter a unique playlist name. this playlist name already exits....']);
    }

    $request->validate([
    'image' => 'required|max:1000000'
    ]);

    // Check file size
    $path=public_path().'/asset/uploads/media/';
    $allowedfileExtension=['mp4','ogv','webm','jpg','jpeg','gif','png','svg'];

    if($request->hasFile('image')):
    $files=$request->file('image');

    foreach($files as $file):
    $getSize = $file->getSize();

    if(empty($getSize >= 349641)){
    return redirect()->back()->withErrors(['msg'=>'uplode file size is too short please uplode large size file']);
    }

    endforeach;
    endif;
    
    $playlist=new Playlist;
    $playlist->user_id=$user_id;
    $playlist->name=$name;
    $playlist->slidertime=$slidertime;
    $playlist->save();

    $path=public_path().'/asset/uploads/media/';
    $allowedfileExtension=['mp4','ogv','webm','jpg','jpeg','gif','png','svg'];

    if($request->hasFile('image')):
        $files=$request->file('image');

        foreach($files as $file):

            $extension=strtolower($file->getClientOriginalExtension());
            $filename=time().rand(1111,9999).'.'.$extension;
            $upload_filename='asset/uploads/media/'.$filename;
            $check=in_array($extension,$allowedfileExtension);

            if($check){
                $file->move($path, $filename);
                $media=new Media_file;
                $media->user_id=$user_id;
                $media->playlist_id=$playlist->id;
                $media->name=$filename;
                $media->type=$extension;
                $media->url=$upload_filename;
                $media->playlist_type='playlist';
                $media->save();
            }

            endforeach;
            endif;
               
            return redirect()->route('admin.playlist.list')->with('success', 'upload data success....');
        }

        public function list_edit($id){
            $media = Media_file::where('playlist_id',$id)->get();
            $playlists = Playlist::where('id', $id)->first();
            return view('admin.playlist.edit',['playlists'=>$playlists,'media'=>$media]);
        }

        public function list_delete($id){
            $playlists = Playlist::where('id',$id)->firstorfail()->delete();
            return redirect()->route('admin.playlist.list')->with('success','deleted data success....');
        }

        public function update(Request $request,$id){
            $user_id=Auth::user()->id;
            $playlist=Playlist::find($id);
            $name=$request->input('name');
            $slidertime=(!empty($request->input('slidertime')))?$request->input('slidertime'):'0';

            $playlist = new Playlist;
            $playlist->user_id=$user_id;
            $playlist->name=$name;
            $playlist->slidertime=$slidertime;
            $playlist->update();

            $media = Media_file::where('playlist_id',$id)->first();
            $path=public_path().'/asset/uploads/media/';
            $allowedfileExtension=['mp4','ogv','webm','jpg','jpeg','gif','png','svg'];

            if($request->hasFile('image')):
                $files=$request->file('image');
                foreach($files as $file):

            $extension = strtolower($file->getClientOriginalExtension());
            $filename=time().rand(1111,9999).'.'.$extension;
            $upload_filename='asset/uploads/media/'.$filename;
            $check=in_array($extension,$allowedfileExtension);

            if($check){
                $file->move($path, $filename);
                    $media = new Media_file;
                    $media->user_id=$user_id;
                    $media->playlist_id=$id;
                    $media->name=$filename;
                    $media->type=$extension;
                    $media->url=$upload_filename;
                    $media->playlist_type='playlist';
                    $media->save();
                }
                endforeach;
                endif;
                    return redirect()->route('admin.playlist.list')->with('success', 'update playlist data success....');
        }

        public function play_delete($id){
            $media =Media_file::where('id',$id)->firstorfail()->delete();
            return back()->with('success','Preview delete success');
        }
}