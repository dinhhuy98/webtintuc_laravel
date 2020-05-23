<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function getLogin(){
    	return view("admin.auth.login");
    }

    public function postLogin(Request $request){
    	$validateData = $request->validate([
    		'email'=>['required','email:rfc'],
    		'password'=>['required']
    	],[
    		'email.required'=>'Vui lòng điền vào trường này',
    		'email.email'=>'Sai định dạng email',
    		'password.required'=>'Vui lòng điền vào trường này'
    	]);
    	$credentials = $request->only('email','password');
    	$credentials['role']=1;
    	$remember=false;
    	if($request->has('remember'))
    		$remember=true;
    	if(Auth::attempt($credentials,$remember)){
    		return redirect()->route('index');
    	}
    	else{
    		return redirect('admin/login')->with('status','Sai thông tin đăng nhập!');
    	}
    	

    }

    public function logout(){
    	Auth::logout();
    	return redirect('admin/login');
    }
}
