<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class packChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
            ->setTitle('Pack de prix')
            ->setSubtitle('année 2021.')
            ->addData([20, 15, 30])
            ->setLabels(['Economique', 'Standard', 'VIP']);
    }
    
}
