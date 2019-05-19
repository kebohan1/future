<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
    public function get(Request $request)
    {
        echo '123';
    }
    // public function get(){
    //     var_dump($response);
    //     echo '123';
    //     // if (DB::select('select * from api_token where token = ? and active = true', [$response->token])==null) {
    //     //     return response()->json(['data_status'=>'forbidden:token error']);
    //     // }
    //     // if(DB::select('select * from users where id = ? and password = ?',[$response->uid,Hash::make($response->password)])!=null){
    //     //     return response()->json(['data_status'=>'forbidden:auth error']);
    //     // } else {
    //     //     $gps_data=DB::select('select * from gps where uid = ? order by timestamps DESC limit 6', [$response->uid]);
    //     //     return response()->json(['data_status'=>'success','data'=>$gps_data->toJson()]);
    //     // }Request $response
    // }

    // public function writeGPS(Request $response){
    //     var_dump($response);
    //     return 123;
    //     // if (DB::select('select * from api_token where token = ? and active = true', [$response->token])==null) {
    //     //     return response()->json(['data_status'=>'forbidden:token error']);
    //     // }
    //     // if(DB::select('select * from users where id = ? and password = ?',[$response->uid,Hash::make($response->password)])!=null){
    //     //     return response()->json(['data_status'=>'forbidden:auth error']);
    //     // } else {
    //     //     $gps_data=DB::insert('insert into gps (longitude, latitude, uid) values (?, ?, ?)', [$response->longitude, $response->latitude, $response->uid]);
    //     //     return response()->json(['data_status'=>'success']);
    //     // }
    // }

    //
}
