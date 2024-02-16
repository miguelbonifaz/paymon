<?php

namespace App\Http\Controllers;

use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        return view('videos.index');
    }

    public function show(Video $video)
    {
        return view('videos.show', [
            'video' => $video
        ]);
    }
}
