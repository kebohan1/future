<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Apitoken;
use Illuminate\Support\Facades\Hash;
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
        // echo "123";
        // var_dump($response);
        if(!(isset($response->name) and isset($response->alarm_time) and isset($response->monday_switch)and isset($response->tuesday_switch) and isset($response->wednesday_switch) and isset($response->thursday_switch) and isset($response->friday_switch) and isset($response->saturday_switch) and isset($response->sunday_switch) and isset($response->uid))){
            return response()->json(['data_status'=>'some_parameter_is_null'],404);
        } 

        if (sizeof(DB::table('apitoken')->where('token','=',$response->token)->where('active','=','1')->get())==0) {
            return response()->json(['data_status'=>'forbidden:token error'],401);
        }
        $user = DB::table('users')->where('id','=',$response->uid)->get();
        // // var_dump(Hash::check($response->password,$user[0]->password));


        if(!Hash::check($response->password,$user[0]->password)||isset($user)){
            return response()->json(['data_status'=>'forbidden:auth error'],403);
        } else {
            DB::table('notification')->insert([
            
                'name' => $response->name, 
                'alarm_time' => $response->alarm_time,
                'monday_switch' => $response->monday_switch,
                'tuesday_switch' => $response->tuesday_switch,
                'wednesday_switch' => $response->wednesday_switch,
                'thursday_switch' => $response->thursday_switch,
                'friday_switch' => $response->friday_switch,
                'saturday_switch' => $response->saturday_switch,
                'sunday_switch' => $response->sunday_switch,
                'active' => '1',
                'uid' =>$response->uid

            ])
            return response()->json(['data_status'=>'success'],200);

            
        }
    }
}
