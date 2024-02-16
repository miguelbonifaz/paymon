<?php

namespace App\Reports;

use App\Models\Video;
use App\Presenters\AnalyticReportPresenter;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AnalyticsReport
{
    public function __construct(
        public Carbon $fromDate,
        public Carbon $toDate,
    ) {
    }

    public function present(): AnalyticReportPresenter
    {
        return new AnalyticReportPresenter($this);
    }

    public function getMostViewedVideosByMonth(): Collection
    {
        return Video::query()
            ->searchByDateRange($this->fromDate, $this->toDate)
            ->orderByDesc('views')
            ->get()
            ->map(function (Video $video) {
                return [
                    'id' => $video->id,
                    'title' => $video->title,
                    'views' => $video->views,
                ];
            });
    }
}