<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use \App\Models\User;
use Exception;

class UsersController extends Controller
{
    //get User count
    public function getUserCoun (){
        try {
            $res = DB::table('users')->count();
            return $res;
        }
        catch (Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'Ошибка в коде',
            ],500);
        }
    }

    //get user list
    public function getList () {
        try {
            $res = DB::table('users') ->select('id', 'discord_id', 'name', 'balance', 'ban')->get();
            return $res;
        }
        catch (Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'Ошибка в коде',
            ],500);
        }
    }
    //edit user
    public function edit (UserRequest $request) {
        try {
            $data = $request->validated();
            $request->except(['discord_id', 'name']); 
            $user = User::find($request->id);

            if(!$user){
                return response()->json([
                    'status' => 'false',
                    'message' => 'Пользователь не найден!'
                ],404);
            }else {
                $user->update($data);
                return response()->json([
                    'status' => 'true',
                    'message' => 'Пользователь отредактирован!'
                ], 200);
            }
        } 
        catch (Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'Ошибка в коде',
            ],500);
        }
    }
}
