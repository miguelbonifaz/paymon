<?php

namespace Admin\Videos;

use Tests\TestCase;

class ListVideosTest extends TestCase
{
    /** @test */
    public function it_can_render_page()
    {
        // Arrange
        $uri = route('admin.videos.index');

        // Act
        $response = $this->actingAsRandomUser()->get($uri);

        // Assert
        $response->assertOk();
        $response->assertSeeLivewire('admin.videos.list-video');
    }
}
