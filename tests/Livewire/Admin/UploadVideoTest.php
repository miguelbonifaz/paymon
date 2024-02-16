<?php

namespace Tests\Livewire\Admin;

use App\Livewire\Admin\Videos\CreateVideo;
use App\Models\Video;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire;
use Livewire\Features\SupportTesting\Testable;
use Tests\TestCase;

class UploadVideoTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
        $this->actingAsAdmin();
    }

    private function buildComponent($data = []): Testable
    {
        return Livewire::test(CreateVideo::class, $data);
    }

    /** @test */
    public function it_can_render_the_component()
    {
        // Arrange

        // Act
        $component = $this->buildComponent();

        // Assert
        $component->assertSet('title', '');
        $component->assertSet('video', '');
    }

    /** @test */
    public function it_can_upload_a_video()
    {
        // Arrange
        $data = Video::factory()->make();

        // Act
        $component = $this->buildComponent()
            ->set('title', $data->title)
            ->set('video', UploadedFile::fake()->create('video.mp4'))
            ->call('save');

        // Assert
        $component->assertRedirect(route('admin.videos.index'));

        $this->assertCount(1, Video::all());

        $video = Video::first();
        $this->assertEquals($data->title, $video->title);
        $this->assertNotNull($video->url);
        $this->assertEquals(0, $video->views);
        Storage::disk('public')->assertExists($video->url);
    }
}
