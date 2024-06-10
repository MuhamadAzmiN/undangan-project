<?php

namespace App\Charts;
use App\Models\User;
use App\Models\Absen;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class AbsenChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        $userKeteranganTrue = User::where('keterangan', false)->get();
        $userCount = $userKeteranganTrue->count();
        $userKeterangan = Absen::all();
        $absenCount = $userKeterangan->count();
        return $this->chart->pieChart()
            ->setTitle('Top 3 scorers of the team.')
            ->setSubtitle('Season 2021.')
            ->addData([$userCount, $absenCount ])
            ->setLabels(['Belum Hadir', 'Sudah hadir']);
    }
}
