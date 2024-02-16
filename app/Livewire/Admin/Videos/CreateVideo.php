<?php

namespace App\Livewire\Admin\Videos;

use App\Models\Video;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $title = '';

    #[Validate('required|file|max:102400')]
    public $video;

    public function save(): void
    {
        $this->validate();

        $videoPath = $this->video->store('videos', 'public');

        Video::create([
            'title' => $this->title,
            'url' => $videoPath,
            'uploaded_at' => now()
        ]);

        session()->flash('flash_success', 'Video created successfully!');

        $this->redirectRoute('admin.videos.index');
    }

    public function render()
    {
        return view('livewire.video.admin.create-video');
    }
}
