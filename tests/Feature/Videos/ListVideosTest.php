<?php

namespace Tests\Feature\Videos;

use Tests\TestCase;

class ListVideosTest extends TestCase
{
    /** @test */
    public function it_can_render_page()
    {
        // Arrange
        $uri = route('videos.index');

        // Act
        $response = $this->actingAsUser()->get($uri);

        // Assert
        $response->assertOk();
        $response->assertSeeLivewire('videos.list-video');
    }
}
