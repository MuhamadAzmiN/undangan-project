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
            ->setTitle('')
            ->setSubtitle('')
            ->addData([$userCount, $absenCount ])
            ->setLabels(['Belum Hadir', 'Sudah hadir'])
            ->setWidth(320) // Mengatur lebar chart (opsional)
            ->setHeight(400); // Mengatur tinggi chart (opsional)
           
    }
}
