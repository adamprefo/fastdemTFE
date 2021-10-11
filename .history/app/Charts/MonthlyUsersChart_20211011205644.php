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
        ->setTitle('Reservatons des 6 derniers mois.')
        ->setSubtitle('Reservation et Les packs choisis.')
        ->addData('Reservation', [40, 93, 35, 42, 18, 82])
        ->setXAxis(['Jan', 'Fev', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil', 'Août','Sept','Nov','Oct','Dec'])
        ->setColors(['#ff5c14', '#0a1b2f','#4CB8DE','#E51330']);
        
    
    }
    
}