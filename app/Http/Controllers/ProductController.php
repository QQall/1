<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use \App\Models\Product;
use App\Http\Requests\ProductRequest;
use Exception;

class ProductController extends Controller
{

    //get User count
    public function getProductCoun (){
        try {
            $res = DB::table('products')->count();
            return $res;
        }
        catch (Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'Ошибка в коде',
            ],500);
        }
    }

    public function getList () {
        try {
            $product = DB::table('products')->select('id', 'name', 'price', 'discount')->get();
            return $product;
        }
        catch (Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'Ошибка в коде',
            ],500);
        }
    }
    public function create (ProductRequest $request) {
        try{
            $data = $request->validated();
            Product::create($data);

            return response()->json([
                'status'=> 'true',
                'message'=> 'Товар создан!',
            ], 200);
        }
        catch (Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'Ошибка в коде',
            ],500);
        }
    }
    public function edit (ProductRequest $request) {
        try {
            $data = $request->validated();
            $product = Product::find($request->id);

            if(!$product) {
                return response()->json([
                    'status' => 'false',
                    'message' => 'Товар не найден!'
                ],404);
            }else {
                $product->update($data);
                return response()->json([
                    'status'=> 'true',
                    'message'=> 'Товар отредактирован!',
                ],200);
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
            $product = Product::find($request->id);
            if(!$product){
                return response()->json([
                    'status' => 'false',
                    'message' => 'Товар не найден!'
                ],404);
            }else {
                $product->delete();
                return response()->json([
                    'status' => 'true',
                    'message' => 'Товар удалён!'
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
