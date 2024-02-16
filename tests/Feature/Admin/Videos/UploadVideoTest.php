<?php

namespace Admin\Videos;

use Tests\TestCase;

class UploadVideoTest extends TestCase
{
    /** @test */
    public function it_can_see_upload_video_form()
    {
        // Arrange
        $uri = route('admin.videos.create');

        // Act
        $response = $this->actingAsAdmin()->get($uri);

        // Assert
        $response->assertOk();
        $response->assertSeeLivewire('video.admin.create-video');
    }
}
