<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Notify;
class NotificationController extends Controller
{
    /**
     * User Search, Add and Update
     * user_status: exists(when user exists in database),success(insert or update user success and return to android),error(there is no user inside db);
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function new(Request $response){

        if(!(isset($response->name) and isset($response->alarm_time) and isset($response->monday_switch)and isset($response->tuesday_switch) and isset($response->wednesday_switch) and isset($response->thursday_switch) and isset($response->friday_switch) and isset($response->saturday_switch) and isset($response->sunday_switch) and isset($response->uid) and isset($response->token))){
            return response()->json(['data_status'=>'some_parameter_is_null'],404);
        } 

        if (sizeof(DB::table('apitoken')->where('token','=',$response->token)->where('active','=','1')->get())==0) {
            return response()->json(['data_status'=>'forbidden:token error'],401);
        }

        $user = DB::table('users')->where('id','=',$response->uid)->get();

        if(!Hash::check($response->password,$user[0]->password)||!isset($user)){
            return response()->json(['data_status'=>'forbidden:auth error'],403);
        } else {
            $new_notify = new Notify;
            $new_notify->name = $response->name;
            $new_notify->alarm_time = $response->alarm_time;
            $new_notify->monday_switch = $response->monday_switch;
            $new_notify->tuesday_switch = $response->tuesday_switch;
            $new_notify->wednesday_switch = $response->wednesday_switch;
            $new_notify->thursday_switch = $response->thursday_switch;
            $new_notify->friday_switch = $response->friday_switch;
            $new_notify->saturday_switch = $response->saturday_switch;
            $new_notify->sunday_switch = $response->sunday_switch;
            $new_notify->uid = $response->uid;
            $new_notify->active = '1';
            $new_notify->save();
            return response()->json(['data_status'=>'success'],200);
        }

    }

    public function get(Request $response){
        if(!(isset($response->uid) and isset($response->password) and isset($response->token))){
            return response()->json(['data_status'=>'some_parameter_is_null'],404);
        } 

        if (sizeof(DB::table('apitoken')->where('token','=',$response->token)->where('active','=','1')->get())==0) {
            return response()->json(['data_status'=>'forbidden:token error'],401);
        }

        $user = DB::table('users')->where('id','=',$response->uid)->get();

        if(!Hash::check($response->password,$user[0]->password)||!isset($user)){
            return response()->json(['data_status'=>'forbidden:auth error'],403);
        } else {
            $new_notify = Notify::where('uid',$response->uid)->orderBy('alarm_time','asc')->get();
            
            return $new_notify->toJson();
        }

    }
}
