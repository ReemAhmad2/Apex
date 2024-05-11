<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),Message::roles());

        if($validation->fails()){

            return response([
                'data' => null,
                'status' => false,
                'error' => $validation->errors(),
                'statusCode' => 422
            ]);
        }

        try{
            Message::create($request->all());
            return response([
                'data' => ['message' => 'Success add message'],
                'status' => true,
                'error' => null ,
                'statusCode' => 200
            ]);

        }catch(\Exception $e){
            return response([
                'data' => null,
                'status' => false,
                'error' => $e->getMessage() ,
                'statusCode' => 500
            ]);
        }
    }
}
