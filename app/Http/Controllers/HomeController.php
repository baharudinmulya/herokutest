<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Absensi;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function kirimemail()
    {
        
    }
    public function index()
    {   
        
        $data['users'] = User::where('id', Auth::id())->first();
        $data['kelas'] = Kelas::get();
        $data['materi'] = Materi::get();
        $data['tanggal'] = Carbon::now("GMT+7")->toDateString();
        $data['cekAbsen'] = Absensi::where('asisten_id', Auth::id())->where('date', $data['tanggal'])->where('end', null)->first();
        return view('dashboard', $data);
    }
}
