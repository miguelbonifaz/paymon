<?php

namespace Tests\Livewire\Videos;

use App\Livewire\Videos\ShowVideo;
use App\Models\Video;
use Livewire;
use Livewire\Features\SupportTesting\Testable;
use Tests\TestCase;

class ShowVideoTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAsRandomUser();
    }

    private function buildComponent($data = []): Testable
    {
        return Livewire::test(ShowVideo::class, $data);
    }

    /** @test */
    public function it_can_render_the_component()
    {
        // Arrange
        $video = Video::factory()->create();
        $component = $this->buildComponent([
            'videoId' => $video->id
        ]);

        // Assert
        $component->assertOk();
        $this->assertEquals($video->id, $component->viewData('video')->id);
    }

    /** @test */
    public function when_videoPlayed_is_called_video_View_should_be_increased()
    {
        // Arrange
        $video = Video::factory()->create(['views' => 0]);
        $this->assertEquals(0, $video->views);

        $component = $this->buildComponent([
            'videoId' => $video->id
        ]);

        // Act
        $component->call('videoPlayed');

        // Assert
        $this->assertEquals(1, $video->fresh()->views);
    }
}
