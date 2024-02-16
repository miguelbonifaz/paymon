<?php

namespace App\Livewire\Videos;

use App\Models\Video;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowVideo extends Component
{
    public Video $video;

    protected $listeners = ['video-played' => 'videoPlayed'];

    public function mount(int $videoId): void
    {
        $this->video = Video::find($videoId);
    }

    public function render(): View
    {
        return view('livewire.video.show-video');
    }

    public function videoPlayed(): void
    {
        $this->video->increment('views');
    }
}