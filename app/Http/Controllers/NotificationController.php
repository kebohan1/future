<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Routing\ResponseFactory;
use DB;
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

    public function new_notification($response){
        
    }
    // public function new_user($response){
    //     if(DB::select('select * from users where id = ?',[$response->uid])!=null){
    //         return response()->json(['user_status'=>'exists']);
    //     } else {
    //         DB::insert('insert into users (id, name, password) values (?, ?, ?)', [$response->uid, $response->name,Hash::make($repsone->password)]);
    //         return response()->json(['user_status'=>'success']);
    //     }
    // }

    // public function update_user_password($response){
    //     if(DB::select('select * from users where id = ?',[$response->uid])==null){
    //         return response()->json(['user_status'=>'error']);
    //     } else {
    //         DB::update('update users set password = ? where id = ?',[$response->password,$response->uid]);
    //         return response()->json(['user_status'=>'success']);
    //     }
    // }

    // public function update_user_name($response){
    //     if(DB::select('select * from users where id = ?',[$response->uid])==null){
    //         return response()->json(['user_status'=>'error']);
    //     } else {
    //         DB::update('update users set name = ? where id = ?',[$response->name,$response->uid]);
    //         return response()->json(['user_status'=>'success']);
    //     }
    // }
    //
}
