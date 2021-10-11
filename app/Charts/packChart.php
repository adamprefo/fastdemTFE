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
            ->setTitle('Pack de prix les plus vendus')
            ->setSubtitle('année 2021.')
            ->addData([80, 45, 64])
            ->setLabels(['Economique', 'Standard', 'VIP'])
            ->setColors(['#ff5c14', '#E51330','#4CB8DE']);
    }
    
}
