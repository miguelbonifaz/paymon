<?php

namespace Tests\Feature\Api;

use App\Models\Video;
use Tests\TestCase;

class StoreVideoTest extends TestCase
{
    /** @test */
    public function it_can_store_a_video()
    {
        $this->markTestIncomplete();
        $data = Video::factory()->make();

        $response = $this->actingAsRandomUser()->postJson(route('api.videos.store'), [
           'title' => $data->title,
           'url' => $data->url,
        ]);

    }
}
