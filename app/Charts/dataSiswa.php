<?php

namespace App\Charts;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class dataSiswa
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $userPPLG = User::where('romble', 'PPLG')->get();
        $jumlahPPLG = $userPPLG->count();
        
        $userHTL = User::where('romble', 'HTL')->get();
        $jumlahHTL = $userHTL->count();

        $userDKV = User::where('romble', 'DKV')->get();
        $jumlahDKV = $userDKV->count();

        $userTjkt = User::where('romble', 'TJKT')->get();
        $jumlahTjkt = $userTjkt->count();

        return $this->chart->pieChart()
            ->setTitle('Data Jurusan ')
            ->setSubtitle('')
            ->addData([$jumlahTjkt, $jumlahDKV, $jumlahPPLG, $jumlahHTL])
            ->setLabels(['TJKT', 'DKV', 'PPLG', 'HTL'])
            ->setWidth(700) // Mengatur lebar chart (opsional)
            ->setHeight(400); 
    }
}
