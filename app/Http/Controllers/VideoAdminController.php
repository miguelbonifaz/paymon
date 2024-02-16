<?php

namespace App\Http\Controllers;

class VideoAdminController extends Controller
{
    public function index()
    {
        return view('admin.videos.index');
    }

    public function create()
    {
        return view('admin.videos.create');
    }
}
