<?php

namespace App\Livewire\Videos;

use App\Models\Video;
use Livewire\Component;

class ListVideo extends Component
{
    public string $search = '';

    public function render()
    {
        $videos = Video::query()
            ->searchByTitle($this->search)
            ->get();

        return view('livewire.video.list-video', [
            'videos' => $videos
        ]);
    }
}
