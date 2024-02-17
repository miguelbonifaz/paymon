<?php

namespace Tests\Feature\Api\VideoAnalytics;

use App\Models\User;
use App\Models\Video;
use App\Reports\AnalyticsReport;
use Tests\TestCase;

class ListAnalyticsTest extends TestCase
{
    /** @test */
    public function it_can_return_video_analytics()
    {
        // Arrange
        $videos = Video::factory()->create();
        $uri = route('api.video-analytics.index');

        // Act
        $response = $this->actingAs(User::factory()->create(), 'sanctum')->getJson($uri);

        // Assert
        $response->assertOk();
    }
}
