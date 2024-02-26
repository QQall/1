<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use \App\Models\Server;
use App\Http\Requests\ServerRequest;
use Exception;

class ServerController extends Controller
{
    public function getList () {
        try {
            $servers = DB::table('servers') ->select('id', 'name', 'ip', 'port', 'qwery')->get();
            return $servers;
        }
        catch (Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'Ошибка в коде',
            ],500);
        }
    }
    public function create (ServerRequest $request) {
        try{
            $data = $request->validated();
            Server::create($data);
            return response()->json([
                'status'=> 'ok',
                'message'=> 'Сервер создан!',
            ], 200);
        }
        catch (Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'Ошибка в коде',
            ],500);
        }
    }
    public function edit (ServerRequest $request) {
        try {
            $data = $request->validated();
            $server = Server::find($request->id);
            if(!$server){
                return response()->json([
                    'status' => 'false',
                    'message' => 'Сервер не найден!'
                ],404);
            }else {
                $server->update($data);
                return response()->json([
                    'status' => 'true',
                    'message' => 'Сервер отредактирован!'
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'Ошибка в коде',
            ],500);
        }
    }
    public function delete (Request $request) {
        try {
            $server = Server::find($request->id);
            if(!$server){
                return response()->json([
                    'status' => 'false',
                    'message' => 'Сервер не найден!'
                ],404);
            }else {
                $server->delete();
                return response()->json([
                    'status' => 'true',
                    'message' => 'Сервер удалён!'
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'Ошибка в коде',
            ],500);
        }
    }

}
