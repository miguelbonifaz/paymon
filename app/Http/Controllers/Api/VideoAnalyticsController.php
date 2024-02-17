<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Reports\AnalyticsReport;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class VideoAnalyticsController extends Controller
{
    public function __invoke()
    {
        $filters = [
            'fromDate' => Carbon::parse(request('fromDate', today()->subMonths(3))),
            'toDate' => Carbon::parse(request('toDate', today())),
        ];

        $analyticReport = app(AnalyticsReport::class, [
            'fromDate' => $filters['fromDate'],
            'toDate' => $filters['toDate'],
        ]);

        return response()->json([
            'data' => $analyticReport->getMostViewedVideosByMonth()
        ], Response::HTTP_OK);
    }
}
