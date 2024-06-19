<?php

namespace App\Http\Controllers;

use App\Charts\AbsenChart;
use App\Charts\dataSiswa;
use App\Charts\DataSiswaChart;
use App\Models\Absen;
use App\Models\User;
use App\Models\Pesan;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValueMap;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
    {
    return view('dashboard.petugas.index', [
        "title" => "Halaman Petugas",
        "user"  => Absen::all()
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('nis', $request->nis)->first();
        if (!$user) {
            return redirect('/dashboard/petugas')->with('info', 'Nama tidak ditemukan dalam database.');
        }
    
        $absen = Absen::where('nis', $request->nis)->first();
    
        if ($absen) {
            return redirect('/dashboard/petugas')->with('info', 'Nama sudah absen.');
        }
        $absenCreate = Absen::create([
            'id' => $request->id,
            'nis' => $request->nis
        ]);
    
        $user->keterangan = true;
        $oneMinuteAfter = $absenCreate->created_at->addMinute(1);

        if ($oneMinuteAfter->lessThanOrEqualTo(now())) {
            return redirect('/dashboard/petugas')->with('success', 'Silahkan masuk.');
        }
        $user->save();
        if ($oneMinuteAfter->lessThanOrEqualTo(now())) {
            // Gunakan response JSON unidiuk memberi tahu halaman bahwa operasi berhasil dan modal harus ditampilkan
            return response()->json([
                'success' => true,
                'message' => 'Silahkan masuk.'
            ]);
        }
    
        // Jika waktu tidak memenuhi kondisi, kembalikan response biasa
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan.'
        ]);
}




    public function pesan(Request $request)
    {
        $validateData = $request->validate([
            "nama" => 'required|max:255',
            "body" => 'required'
        ]);


        Pesan::create($validateData);

        return redirect('/dashboard/petugas')->with('success', "berhasil terikirim");
    }


    public function dataAbsen(AbsenChart $chart)
    {
    

        return view('dashboard.petugas.dataAbsen',[
            'title' => "Halaman Data Absen",
            "absen" => Absen::latest()->get(),
            "belumAbsen" => User::where('keterangan', false)->get(),
            "user" => User::latest()->filter()->get(),
            "chart" => $chart->build(),
        ]);
    }

    public function data(AbsenChart $chart)
    {
        
        return view('dashboard.petugas.data',[
            'title' => "Halaman Data Absen",
            "absen" => Absen::latest()->get(),
            "belumAbsen" => User::where('keterangan', false)->get(),
            "user" => User::latest()->get(),
            "chart" => $chart->build(),
        ]);
    }

    public function chart(dataSiswa $chart)
    {
        
        return view('dashboard.petugas.chart',[
            'title' => "Halaman Data Absen",
            "absen" => Absen::latest()->get(),
            "belumAbsen" => User::where('keterangan', false)->get(),
            "user" => User::latest()->get(),
            "chart" => $chart->build(),
        ]);
    }


    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
