<?php

namespace App\Charts;

use App\Models\Reservation;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
   
    public function build()
    {
        return $this->chart->lineChart()
        ->setTitle('Reservaton pour 2021.')
        ->setSubtitle('Reservation vs Les packs choisis.')
        ->addData([Reservation::where('id', '<=', 60)->count() ])
        ->addData('Packs', [70, 29, 77, 28, 55, 45])
        ->setXAxis(['Jan', 'Fev', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil', 'Août','Sept','Nov','Oct','Dec'])
        ->setColors(['#ff5c14', '#0a1b2f']);
        
    
    }
}