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
    // Cari User berdasarkan 'nis'
    $user = User::where('nis', $request->nis)->first();

    // Jika User tidak ditemukan, redirect dengan info
    if (!$user) {
        return redirect('/dashboard/dataAbsen')->with('info', 'Nis tidak ditemukan dalam database.');
    }

    // Cek apakah sudah ada absen dengan 'nis' yang sama
    $absen = Absen::where('nis', $request->nis)->first();

    // Jika sudah ada absen dengan 'nis' yang sama, redirect dengan info
    if ($absen) {
        return redirect('/dashboard/dataAbsen')->with('info', 'Nama sudah absen.');
    }

    // Validasi data yang diterima dari request
    $request->validate([
        'id' => 'required',
        'nis' => 'required|unique:absens', // Pastikan 'nis' unik di tabel 'absens'
    ]);

    // Buat objek Absen baru dengan menggunakan create()
    $absenCreate = Absen::create([
        'id' => $request->id,
        'nis' => $request->nis,
        'user_id' => $user->id, // Isi 'user_id' dengan id User yang ditemukan
    ]);
    $user->keterangan = true;
    $user->save();



    return redirect('/dashboard/dataAbsen')->with('success', 'berhasil absen anda hari ini');
    // return response()->json([
    //     'success' => false,
    //     'message' => 'Data berhasil ditambahkan.'
    // ]);
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
            'title' => "Halaman Data Chart",
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
    public function destroy(Absen $absen, User $user, $id)
    {
    
        $userId = User::find($id);
      
        Absen::where('user_id', $absen->id)->delete();
    
        $userId->keterangan = false;
        $userId->save();
        
        return redirect('/dashboard/dataAbsen')->with('success', 'berhasil terhapus');
    }
}
