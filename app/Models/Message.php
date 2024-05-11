<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','email','phone','message'];

    public static function roles()
    {
        return [
            'email' => 'required|string|email',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'phone'=>'required|string|regex:/^[0-9\+]+$/',
            'message'=>'required|string',
        ];
    }
}
