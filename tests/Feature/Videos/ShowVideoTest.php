<?php

namespace Tests\Feature\Videos;

use App\Models\Video;
use Tests\TestCase;

class ShowVideoTest extends TestCase
{
    /** @test */
    public function it_can_render_page()
    {
        // Arrange
        $video = Video::factory()->create();
        $uri = route('videos.show', $video);

        // Act
        $response = $this->actingAsUser()->get($uri);

        // Assert
        $response->assertOk();
        $response->assertSeeLivewire('videos.show-video');
    }
}
