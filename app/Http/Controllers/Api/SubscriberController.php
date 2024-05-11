<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email' => 'required|string|email'
        ]);

        if($validation->fails()){
            return response([
                'data' => null,
                'status' => false,
                'error' => $validation->errors() ,
                'statusCode' => 422
            ]);
        }


        try{

            $subscriber = Subscriber::whereEmail($request->email)->first();

            if(empty($subscriber))
            {
                $status = 1 ;
                Subscriber::create(['email'=>$request->email ,'status'=>$status]);
            }else{
                $subscriber->status += 1;
                $subscriber->save();
            }
            return response([
                'data' => ['message' => 'Subscription successfully'],
                'status' => true,
                'error' => null ,
                'statusCode' => 200
            ]);

        }catch(\Exception $e)
        {
            return response([
                'data' => null,
                'status' => false,
                'error' => $e->getMessage() ,
                'statusCode' => 500
            ]);
        }


    }

}
