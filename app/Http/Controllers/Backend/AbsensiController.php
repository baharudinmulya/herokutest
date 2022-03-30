<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Code;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
use Carbon\Carbon;
use Auth;


class AbsensiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $idLogin = Auth::id();
        $getIdAsisten = $request->id_asisten;
        $getCode = $request->kode;
        $getIdKelas = $request->kelas;
        $getIdMateri = $request->materi;
        $getPeran = $request->peran_jaga;


        //check id asisten
        $getMatchId = User::where('id', $getIdAsisten)->first();
        if($idLogin == $getMatchId->id) {
            //check kode
            $getMatchKode = Code::where('code', $getCode)->first();
            if($getCode == $getMatchKode->code && (empty($getMatchKode->user_id_get))){
                //check kondisi kode absen tidak sama dengan yg dibuat dengan diri sendiri
                if($getMatchKode->user_id != $idLogin){
                    $today = Carbon::now("GMT+7")->toDateString();
                    $timeNow = Carbon::now("GMT+7")->toTimeString();

                    $store = Absensi::create([
                        "kelas_id" => $getIdKelas,
                        "materi_id" => $getIdMateri,
                        "asisten_id" => $idLogin,
                        "teaching_role" => $getPeran,
                        "date" => $today,
                        "start" => $timeNow,
                        "code_id" => $getMatchKode->id,
                    ]);

                    if(!$store){
                        return redirect()->route('home')->with('error', 'Absen Error');
                    } else {
                        return redirect()->route('home')->with('success', 'Absen Berhasil');
                    }
                } else {
                    return redirect()->route('home')->with('error', 'Kode absen tidak boleh menggunakan kode sendiri');
                }
            } else {
                return redirect()->route('home')->with('error', 'Kode Absen Sudah terpakai');
            }
        } else {
            return redirect()->route('home')->with('error', 'Absen Error');
        }
    }

    public function updateAbsen()
    {
        $carbon = Carbon::now("GMT+7");
        $today = $carbon->toDateString();
        $idLogin = Auth::id();
        $cekAbsen = Absensi::where('asisten_id', Auth::id())->where('date', $today)->where('end', null)->first();

        $start = $cekAbsen->start;
        $out = $carbon->toTimeString();
        $duration = $carbon->diffInMinutes($start);
        $cekAbsen->end = $out;
        $cekAbsen->duration = $duration;
        $cekAbsen->save();
        if(!$cekAbsen){
            return redirect()->route('home')->with('error', 'Clock Out Error');
        } else {
            return redirect()->route('home')->with('success', 'Clock Out Berhasil');
        }
    }
}
