<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\redirect;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller{
    public function login(){
        return view('admin.login');
        }

    public function post_login(Request $request){
        $credentials=request(['email', 'password']);    
        if(Auth::attempt($credentials)){
            return redirect()->intended('/admin');
        }
        return redirect()->back()->withErrors(['msg' => 'login failed']);   
        }

    public function logout(Request $request){
        Auth::logout();
        return redirect('admin/login');
        }
}

?>