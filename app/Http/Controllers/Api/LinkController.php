<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::all();
        $collection = LinkResource::collection($links);
        return response([
            'data' => $collection,
            'status' => true,
            'error' => null ,
            'statusCode' => 200
        ]);
    }
}
