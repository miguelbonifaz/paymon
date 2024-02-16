<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::paginate(15);

        return VideoResource::collection($videos);
    }

    public function store(Request $request)
    {
        return VideoResource::make(Video::create([
            'title' => $request->get('title'),
            'url' => $request->get('url'),
        ]));
    }

    public function show(Video $video)
    {
        return new VideoResource($video);
    }

    public function update(Request $request, Video $video)
    {
        $data = $request->validate([
            'title' => ['required'],
            'url' => ['required'],
            'views' => ['required', 'integer'],
        ]);

        $video->update($data);

        return new VideoResource($video);
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return response()->json();
    }
}
