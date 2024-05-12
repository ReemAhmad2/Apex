<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email' => 'required|string|email',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'phone'=>'required|string|regex:/^[0-9\+]+$/',
            'message'=>'required|string',
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
            $data = $request->only('email','first_name','last_name','phone','message');
            Mail::to('admin@gmail.com')->send(new ContactUs($data));
            return response([
                'data' => ['message' => 'success send'],
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
