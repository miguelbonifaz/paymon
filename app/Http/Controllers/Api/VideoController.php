<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Spatie\QueryBuilder\QueryBuilder;

class VideoController extends Controller
{
    public function index()
    {
        $videos = QueryBuilder::for(Video::class)
            ->allowedFilters(['title'])
            ->paginate(10);

        return VideoResource::collection($videos);
    }
}
