<?php

namespace App\Presenters;

use App\Reports\AnalyticsReport;

class AnalyticReportPresenter
{
    public function __construct(
        public AnalyticsReport $analyticsReport
    )
    {
    }
    
    public function analyticReportForApexcharts(): array
    {
        $data = $this->analyticsReport->getMostViewedVideosByMonth();

        return [
            'series' => [
                [
                    'name' => 'Views',
                    'data' => $data->pluck('views')->toArray(),
                ]
            ],
            'options' => [
                'chart' => [
                    'height' => 350,
                    'type' => 'line',
                ],
                'stroke' => [
                    'width' => 7,
                    'curve' => 'smooth',
                ],
                'xaxis' => [
                    'categories' => $data->pluck('title')->toArray()
                ],
                'title' => [
                    'text' => 'Most Viewed Videos',
                    'align' => 'left',
                ],
                'dataLabels' => [
                    'enabled' => true,
                    'offsetY' => -20,
                    'style' => [
                        'fontSize' => '12px',
                        'colors' => ["#304758"]
                    ]
                ],
                'yaxis' => [
                    'title' => [
                        'text' => 'Views',
                    ],
                ],
                'plotOptions' => [
                    'bar' => [
                        'borderRadius' => 10,
                        'dataLabels' => [
                            'position' => 'top',
                        ],
                    ]
                ],
            ]
        ];
    }
}