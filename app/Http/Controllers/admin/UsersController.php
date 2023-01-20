<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;
class UsersController extends Controller{

    public function add(){
        return view('admin.user.add');
        }

    public function store(Request $request){         
        $uploadpath='';
        $user_id=Auth::user()->id;
        $this->validate(request(),[
        'image' => 'required',
        'name' => 'required',
        'email' => 'required|email',
        'full_name' => 'required',
        'password' => 'required',
        'role' => 'required',
        ]);

        if($request->password != $request->confirm_password){
        return redirect::back()->withErrors(['msg' => 'password not match']);
        }
        $email=$request->email;
        $user=User::where('email',$email)->first();
        $full_name=$request->full_name;
        if(!empty($user)){
        return redirect::back()->withErrors(['msg' =>'email already register']);
        }

        $image=array();
        if($files=$request->file('image')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $destinationPath = public_path('asset/uploads/images/');
                $file->move($destinationPath,$name);
                $uploadpath='asset/uploads/images/'.$name;
            }
        }

        $password=bcrypt($request->password);
        $data_add=['name'=>$request->name,
        'email'=>$request->email,
        'full_name'=>$full_name,
        'parent_id'=>$user_id,
        'password'=>$password,
        'role'=>$request->role,
        'image'=>$uploadpath,
        ];
      
        if(User::insert($data_add)){
        return redirect()->route('admin.user.list')->with('success','add user success..');
        }
        return redirect::back()->withErrors(['msg' => 'ass user failed']);
        }

        public function user_list(){
        $admin = User::where('role','admin')->orderBy('id', 'asc')->get();
        $users = User::where('role','user')->orderBy('id', 'asc')->get();
        return view('admin.user.list',['admin'=>$admin,'users'=>$users]);
        }
        public function active($id){
        if(User::where('id',$id)->update(['status'=>'active'])){
            return redirect()->to('/admin/user/list')->with('success','User active....');
        }else{
            return redirect()->back()->withErrors(['msg'=>'can`t active']);
        }
        }
        public function deactive($id){
        if(User::where('id',$id)->update(['status'=>'deactive'])){
            return redirect()->to('/admin/user/list')->with('success','user deactive....');
        }else{
            return redirect()->back()->withErrors(['msg'=>'can`t user deactive']);
        }
        }
    public function user_edit($id){
        $users = User::where('id', $id)->first();
        return view('admin.user.edit',['users'=>$users]);
    }
    public function delete($id){
        $users = User::where('id',$id)->firstorfail()->delete();
        return redirect()->to('admin.user.list');
    }
    public function update(Request $request,$id){
        $name=$request->name;
        $users = User::where('id',$id)->first();
    
        $data_add['name']=$name;
        User::where('id',$id)->update($data_add);
        return redirect()->route('admin.user.list');

        $image=array();
        if($files=$request->file('image')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $destinationPath = public_path('asset/uploads/images/');
                $file->move($destinationPath,$name);
                $uploadpath='asset/uploads/images/'.$name;
            }
            $data_add=['name'=>$request->name,
            'image'=>$uploadpath,
        ];
        if(User::insert($data_add)){
            return redirect()->route('admin.user.list')->with('success', 'upload data success....');
        }
      }
    }      
}
?>