<?php 
namespace App\Http\Controllers; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\device;
use App\Models\User;

class deviceController extends Controller
{
    function list(){ 
        // echo "blocked"; die;
        return device::all();   
        // return $id?device::find($id):device::all();  "With parameter and without parameter"
    }
    function list_id($id=null){  
        return device::find($id); 
    }
    function add(Request $request){ 
        $save = new device; 
        $save->name =$request->name; 
        $save->device_id =$request->device_id;
        $save->save(); 
        return ["result"=>"Data inserted"]; 
    }
    function update(Request $request){ 
        $device= Device::find($request->id);
        $device->name = $request->name;
        $device->device_id = $request->device_id;
        $device->save();
        return ['result'=>"Updated successfully"];
    }
    function search($name){ 
        $res =  device::where("name",$name)->get();  
        if(count($res)){
            return $res;
        } else {
            return array('Result', 'No records found');
        }
    }
}
