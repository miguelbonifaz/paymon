<?php

namespace Tests\Feature\Admin\Analytics;

use App\Models\Video;
use Tests\TestCase;

class ShowAnalyticsTest extends TestCase
{
    /** @test */
    public function it_can_render_page()
    {
        // Arrange
        Video::factory(10)->create();

        $uri = route('admin.analytics.index');

        // Act
        $response = $this->actingAsRandomUser()->get($uri);

        // Assert
        $response->assertOk();
        $response->assertViewIs('admin.videos.analytics.index');
        $response->assertViewHas([
            'filters',
            'analytics'
        ]);
    }
}
