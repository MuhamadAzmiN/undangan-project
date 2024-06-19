<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use App\Models\User;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.absen.index',[
            "title" => "halaman absen",
            "user" => Absen::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('nis', $request->nis)->first();
        if (!$user) {
            return redirect('/dashboard/absen')->with('info', 'Nama tidak ditemukan dalam database.');
        }
    
        $absen = Absen::where('nis', $request->nis)->first();
    
        if ($absen) {
            return redirect('/dashboard/absen')->with('info', 'Nama sudah absen.');
        }
        $absenCreate = Absen::create([
            'id' => $request->id,
            'nis' => $request->nis
        ]);
    
        // Mengupdate keterangan user
        $user->keterangan = true;
        $oneMinuteAfter = $absenCreate->created_at->addMinute(1);

        if ($oneMinuteAfter->lessThanOrEqualTo(now())) {
            return redirect('/dashboard/post')->with('success', 'Silahkan masuk.');
        }
        $user->save();
        return redirect('/dashboard/absen')->with('success', 'Silahkan masuk.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absen $absen)
    {
        return view('dashboard.absen.edit', [
            "title" => "halaman absen edit",
            "user" => $absen->user
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absen $absen)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absen $absen)
    {
        Absen::destroy($absen->id);
        $absen->user->update(['keterangan' => false]);
        return redirect('/dashboard/absen')->with('danger', "Absen Berhasil Di hapus");
    }
}
