<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{

    // get all news
    public function index()
    {
        $news = News::all();
        $collection = NewsResource::collection($news);
        return response([
            'data' => $collection,
            'status' => true,
            'error' => null ,
            'statusCode' => 200
        ]);
    }
}
