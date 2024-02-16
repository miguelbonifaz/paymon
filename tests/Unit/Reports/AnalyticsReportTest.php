<?php

namespace Tests\Unit\Reports;

use App\Models\Video;
use App\Reports\AnalyticsReport;
use Carbon\Carbon;
use Tests\TestCase;

class AnalyticsReportTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Carbon::setTestNow(today()->startOfMonth()->addDays(15));
    }

    private function buildReport(Carbon $fromDate, Carbon $toDate): AnalyticsReport
    {
        return new AnalyticsReport(
            fromDate: $fromDate,
            toDate: $toDate,
        );
    }

    /** @test */
    public function it_can_get_video_with_more_views()
    {
        // Arrange
        $videos = Video::factory()->createMany([
            ['uploaded_at' => today()],
            ['uploaded_at' => today()->subMonth()],
            ['uploaded_at' => today()->subMonths(2)],
        ]);

        $fromDate = today()->subMonths(2);
        $toDate = today();

        // Act
        $report = $this->buildReport($fromDate, $toDate);

        // Assert
        $this->assertCount(3, $report->getMostViewedVideosByMonth());
        $this->assertEquals(
            [
                today()->format('M Y') => [
                    [
                        'id' => $videos->get(0)->id,
                        'title' => $videos->get(0)->title,
                        'views' => $videos->get(0)->views,
                    ]
                ],
                today()->subMonth()->format('M Y') => [
                    [
                        'id' => $videos->get(1)->id,
                        'title' => $videos->get(1)->title,
                        'views' => $videos->get(1)->views,
                    ]
                ],
                today()->subMonths(2)->format('M Y') => [
                    [
                        'id' => $videos->get(2)->id,
                        'title' => $videos->get(2)->title,
                        'views' => $videos->get(2)->views,
                    ]
                ],
            ],
            $report->getMostViewedVideosByMonth()->toArray()
        );
    }
}
