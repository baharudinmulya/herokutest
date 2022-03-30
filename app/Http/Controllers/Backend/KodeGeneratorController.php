<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Code;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class KodeGeneratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['kodes'] = Code::orderBy('created_at', 'DESC')
                             ->join('users', 'code.user_id', 'users.id')
                             ->where('code.user_id', Auth::id())
                             ->select('code.*', 'users.name')
                             ->get();

        return view('backend.generator.index', $data);
    }
    
    public function store($param)
    {
        $kode = Str::random(8);
        $store = Code::create(['code' => $kode, 'user_id' => Auth::id()]);
        if(!$store){
            return redirect()->route('indexKode')->with('error', 'Kode Generated Failed.');
        } 
        
        if($param == 'frommodule'){
            return redirect()->route('indexKode')->with('success', 'Kode Generated successfully = '.$kode);
        }
        else {
            return redirect()->route('home')->with('success', 'Kode Generated successfully = '.$kode);
        }
    }

}
