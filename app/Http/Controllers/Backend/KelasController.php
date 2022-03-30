<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   $data['kelas'] = Kelas::orderBy('created_at', 'DESC')->get();
        return view('backend.dataKelas.index', $data);
    }

    public function create()
    {
        return view('backend.dataKelas.create');
    }


    public function store(Request $request)
    {
        $store = Kelas::create($request->all());
        if(!$store){
            return redirect()->route('createDataKelas')->with('error', 'Data Added Failed.');
        } 
        return redirect()->route('indexDataKelas')->with('success', 'Data Added Success.');
    }

    
    public function edit($id)
    {
        $data['edit'] = Kelas::find($id);
        if(!$data['edit']){
            return redirect()->route('indexDataKelas')->with('error', 'Data Kelas Not Found.');
        }

        return view('backend.dataKelas.edit', $data);
    }

   
    public function update(Request $request, $id)
    {
        $update = Kelas::updateOrCreate(['id' => $id], $request->all());
        if(!$update) {
            return redirect()->back()->with('error', 'Data Not Found!.');
        }
        return redirect()->route('indexDataKelas')->with('success', 'Data Updated successfully.');        
    }


    public function destroy($id)
    {
        $destroy = Kelas::find($id);
        if(!$destroy){
            return redirect()->route('indexDataKelas')->with('error', 'Data Not Found.');
        }

        $destroy->delete();
        if(!$destroy) {
            return redirect()->route('indexDataKelas')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexDataKelas')->with('success', 'Data Has Been Deleted.');

    }
}
