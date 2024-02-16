<?php

namespace Tests\Livewire\Admin;

use App\Livewire\Videos\ListVideo;
use App\Models\Video;
use Livewire;
use Tests\TestCase;

class ListVideoTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAsAdmin();
    }

    private function buildComponent(): Livewire\Features\SupportTesting\Testable
    {
        return Livewire::test(ListVideo::class);
    }

    /** @test */
    public function it_can_render_the_component()
    {
        // Arrange
        Video::factory(5)->create();

        // Act
        $component = $this->buildComponent();

        // Assert
        $component->assertOk();
        $this->assertCount(5, $component->viewData('videos'));
    }

    /** @test */
    public function it_can_search_a_video()
    {
        // Arrange
        Video::factory(10)->create();
        $video = Video::factory()->create();

        // Act
        $component = $this->buildComponent()
            ->set('search', $video->title);

        // Assert
        $this->assertCount(1, $component->viewData('videos'));
    }
}
