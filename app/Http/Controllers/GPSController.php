<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Apitoken;
use Illuminate\Support\Facades\Hash;
class GPSController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function get(Request $response){
        
        if (sizeof(DB::table('apitoken')->where('token','=',$response->token)->where('active','=','1')->get())==0) {
            return response()->json(['data_status'=>'forbidden:token error']);
        }
        $user = DB::table('users')->where('id','=',$response->uid)->get();
        // var_dump(Hash::check($response->password,$user[0]->password));


        if(!Hash::check($response->password,$user[0]->password)){
            return response()->json(['data_status'=>'forbidden:auth error']);
        } else {
            $gps_data=DB::table('gps')->where('uid','=',$response->uid)->orderBy('created_at','DESC')->take(6)->get();
            if(sizeof($gps_data)==0){
                return response()->json(['data_status'=>'no data']);
            }else{
                return response()->json(['data_status'=>'success','data'=>$gps_data->toJson()]);
            }
            
        }
    }

    public function writeGPS(Request $response){

        // if (DB::select('select * from api_token where token = ? and active = true', [$response->token])==null) {
        //     return response()->json(['data_status'=>'forbidden:token error']);
        // }
        // if(DB::select('select * from users where id = ? and password = ?',[$response->uid,Hash::make($response->password)])!=null){
        //     return response()->json(['data_status'=>'forbidden:auth error']);
        // } else {
        //     $gps_data=DB::insert('insert into gps (longitude, latitude, uid) values (?, ?, ?)', [$response->longitude, $response->latitude, $response->uid]);
        //     return response()->json(['data_status'=>'success']);
        // }
    }

    
}
