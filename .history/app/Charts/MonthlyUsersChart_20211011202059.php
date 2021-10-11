<?php

namespace App\Charts;

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
        ->addData('Reservation', [40, 93, 35, 42, 18, 82])
        ->addData('Economique', [70, 29, 77, 28, 55, 45])
        ->addData('Standard', [10, 20, 60, 5, 0, 60])
        ->addData('VIP', [60, 25, 44, 35, 47, 45])
        ->setXAxis(['Jan', 'Fev', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil', 'Août','Sept','Nov','Oct','Dec'])
        ->setColors(['#ff5c14', '#0a1b2f','#4CB8DE','#E51330']);
        
    
    }
}