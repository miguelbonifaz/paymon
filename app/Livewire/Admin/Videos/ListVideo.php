<?php

namespace App\Livewire\Admin\Videos;

use App\Models\Video;
use Livewire\Component;

class ListVideo extends Component
{
    public function mount()
    {
    }

    public function render()
    {
        $videos = Video::all();

        return view('livewire.video.admin.list-video', [
            'videos' => $videos
        ]);
    }
}
