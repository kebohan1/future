<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Routing\ResponseFactory;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserController extends Controller
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

    public function new_user(Request $response){
        // echo $response;

        if(!empty(User::where('id','=',$response->uid)->first()) ) {
            return response()->json(['user_status'=>'exists']);
        } else {
            $user = new User;
            $user->id=$response->uid;
            echo $response->has('name');
            // if($request->has('name')){
            //     $user->name=$response->name;
            // }
            $user->password = Hash::make($response->password);
            return response()->json(['user_status'=>'success']);
        }
    }

    // public function update_user_password(Request $response){
    //     if(DB::select('select * from users where id = ?',[$response->uid])==null){
    //         return response()->json(['user_status'=>'error']);
    //     } else {
    //         DB::update('update users set password = ? where id = ?',[$response->password,$response->uid]);
    //         return response()->json(['user_status'=>'success']);
    //     }
    // }

    // public function update_user_name(Request $response){
    //     if(DB::select('select * from users where id = ?',[$response->uid])==null){
    //         return response()->json(['user_status'=>'error']);
    //     } else {
    //         DB::update('update users set name = ? where id = ?',[$response->name,$response->uid]);
    //         return response()->json(['user_status'=>'success']);
    //     }
    // }
    //
}
