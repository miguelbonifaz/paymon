<?php

namespace Api\Video;

use App\Models\User;
use App\Models\Video;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ListVideosTest extends TestCase
{
    private function listVideos($data = []): TestResponse
    {
        $uri = route('api.videos.index', $data);

        return $this->actingAs(User::factory()->create(), 'sanctum')->getJson($uri);
    }

    /** @test */
    public function it_can_list_videos()
    {
        // Arrange
        Video::factory(10)->create();

        // Act
        $response = $this->listVideos();

        // Assert
        $response->assertOk();
        $response->assertJsonCount(10, 'data');
    }

    /** @test */
    public function it_can_search_a_video_by_title()
    {
        // Arrange
        $videos = Video::factory(10)->create();
        $video = $videos->random();

        // Act
        $response = $this->listVideos([
            'filter' => [
                'title' => $video->title
            ]
        ]);

        // Assert
        $response->assertOk();
        $response->assertJsonCount(1, 'data');
    }
}
