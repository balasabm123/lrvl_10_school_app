<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Email;

class AuthController extends Controller
{ 
       function login(){ 
        
        return view('auth.login');
    }
    function register(){
       return view('auth.register');
    }
    function forgot(){
        return view('auth.forgot');
    }

    function user_register(Request $request){
     
        request()->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        // echo "<pre>"; print_r($save); die;
        $save->save();
        return redirect('login')->with('success', "USer registered successfully");
    }

    function auth_ligin(Request $request){
            // dd($request->all());
            $remember = !empty($request->remember) ? true : false;
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                // echo "I in dashboardaaaa"; die;
                return redirect('dasboard');
            }else{
                return redirect()->back()->with('error','Please enter correct email and password');
            }
    }
    function forgot_password(Request $request){
            // dd($request->all());
            $user= User::where('Email','=',$request->email)->first();
            // print_r($user); die;
            if(!empty($user)){
                // echo "send email link under developpment";
                return redirect('reset');
                // ECHO "<PRE>";
                // print_r($user); die;
                // $request = $user; 
            
                // $this->reset($request);
                $id=10;
                // $this->reset($request, $id);
                return $this->reset($request,$id);
            }else{
                return redirect()->back()->with('error', "Your Email is not registered with us..");
            }
    }

    function reset(Request $request, $id){
//  echo "test"; die;
        return view('auth.reset'); 
    }
    public function logout(){
            Auth::logout();
            return redirect('login');
    }
}
