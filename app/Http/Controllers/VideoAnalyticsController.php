<?php

namespace App\Http\Controllers;

use App\Reports\AnalyticsReport;
use Carbon\Carbon;

class VideoAnalyticsController extends Controller
{
    public function __invoke()
    {
        $filters = [
            'fromDate' => Carbon::parse(request('fromDate', today()->subMonths(3))),
            'toDate' => Carbon::parse(request('toDate', today())),
        ];

        $analyticReport = new AnalyticsReport($filters['fromDate'], $filters['toDate']);

        return view('admin.videos.analytics.index', [
            'filters' => $filters,
            'analytics' => $analyticReport->present()->analyticReportForApexcharts(),
        ]);
    }
}
