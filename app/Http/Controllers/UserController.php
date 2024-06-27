<?php

namespace App\Http\Controllers;

use App\Charts\AbsenChart;
use App\Charts\dataSiswa;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //
    public function index(AbsenChart $chart, dataSiswa $data)
    {


        $userPPLG = User::where('romble', 'PPLG')->get();
        $jumlahPPLG = $userPPLG->count();

        $userHTL = User::where('romble', 'HTL')->get();
        $jumlahHTL = $userHTL->count();

        $userDKV = User::where('romble', 'DKV')->get();
        $jumlahDKV = $userDKV->count();

        $userTjkt = User::where('romble', 'TJKT')->get();
        $jumlahTjkt = $userTjkt->count();


        // $jumlahLike = Like::where('post_id', auth()->user()->id)->get();
        // $countLike = $jumlahLike->count();
        // dd($countLike);

        return view('dashboard.index', [
            "title" => "home",
            "data" => User::all(),
            "chart" => $chart->build(),
            "pplg" => $jumlahPPLG,
            'htl' => $jumlahHTL,
            "dkv" => $jumlahDKV,
            "tjkt" => $jumlahTjkt,
            "chartData" => $data->build()
        ]);
    }

    public function detail(User $user)
    {
        return view('dashboard.detail',[
            "title" => "halaman detail",
            "user" => $user
        ]);
    }



    public function dataDiri(User $user)
    {

        return view('dashboard.dataUser.edit',[
            "title" => "Halaman edit Data diri",
            "user" =>User::all()


        ]);
    }

    public function dataImage()
    {
        return view('dashboard.dataUser.edit', [
            "title" => "halaman edit"
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            "name" => "required|max:255",
            "nis" => "required",
            "rayon" => "required",
            "romble" => 'required'
        ];

        // if($request->slug !== $user->slug)
        // {
        //     $rules['slug'] = 'required|unique:posts';
        // }

        $validateData = $request->validate($rules);

        if($request->file('image')){

            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData["image"] = $request->file('image')->store('user-image');
        }

        User::where('id', auth()->user()->id)
                    ->update($validateData);

        if(auth()->user()->id !== auth()->user()->id) {
                        abort(403);
        }


        return redirect('/dashboard/dataDiri')->with('success', " Data anda Berhasil Terupdate");

    }


    public function updateImage(Request $request, User $user)
    {
        $rules = [
            'image' => 'image|file'
        ];

        // if($request->slug !== $user->slug)
        // {
        //     $rules['slug'] = 'required|unique:posts';
        // }

        $validateData = $request->validate($rules);


        if($request->file('image')){

            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData["image"] = $request->file('image')->store('user-image');
        }else {
            return redirect('/dashboard/dataDiri')->with('danger', 'Silahkan upload berupa gambar');
        }

        User::where('id', auth()->user()->id)
                    ->update($validateData);


        return redirect('/dashboard/dataDiri')->with('success', "Berhasil Mengubah Profile anda");

    }





}
