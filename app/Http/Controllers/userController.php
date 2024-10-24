<?php

namespace App\Http\Controllers;

use App\Events\registerEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class userController extends Controller
{
    public function user(){
        $data['getRecords']=User::getRecordUser();
        return view('backend.user.list',$data);
    }
    public function add_user(){
        // echo "add user"; die;
        return view('backend.user.add_user');
    }
    public function insert_user(Request $request){
        // dd($request->all());


        request()->validate([
            'name'      =>'required',
            'email'     =>'required|email|unique:Users',
            'password'  =>'required',

        ]);
        $save = new User;
        $save->name         = trim($request->name);
        $save->email         = trim($request->email);
        $save->password     =  Hash::make($request->password);
        $save->status       = trim($request->status);
        // $save->is_admin       = 0;
        $save->is_delete       = 0;


        $save->save();
        // event(new registerEvent($save));

        return redirect('user_list')->with('success',"User Succesfully Created");
    }
    public function edit_user($id){
        $data['getRecord']=User::getSingle($id);
        return view('backend.user.update_user',$data);
    }
    public function update_user($id, Request $request){

        request()->validate([
            'name'      =>'required',
            'email'     =>'required|email|unique:Users,email,'.$id

        ]);

        $save = User::getSingle($id);
        $save->name         = trim($request->name);
        $save->email         = trim($request->email);
        if(!empty($request->password)){ 
        $save->password     =  Hash::make($request->password);
        }
        $save->status       = trim($request->status);
        $save->save();
        return redirect('user_list')->with('success',"User Succesfully Updated"); 
    }

    public function delete_user($id){
        $save = User::getSingle($id);
        $save->is_delete       = 1;
        $save->save();
        return redirect('user_list')->with('success',"Record deleted Successfully"); 
    }
}
