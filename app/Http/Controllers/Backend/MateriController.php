<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['materis'] = Materi::orderBy('created_at', 'DESC')->get();

        return view('backend.dataMateri.index', $data);
    }

    
    public function create()
    {
        return view('backend.dataMateri.create');
    }


    public function store(Request $request)
    {
        $store = Materi::create($request->all());

        if(!$store){
            return redirect()->route('createDataMateri')->with('error', 'Data Added Failed.');
        } 
        return redirect()->route('indexDataMateri')->with('success', 'Data Added Success.');
    }


    public function edit($id)
    {
        $data['edit'] = Materi::find($id);
        if(!$data['edit']){
            return redirect()->route('indexDataMateri')->with('error', 'Data Materi Not Found.');
        }

        return view('backend.dataMateri.edit', $data);
    }

    
    public function update(Request $request, $id)
    {
        $update = Materi::updateOrCreate(['id' => $id], $request->all());
        if(!$update) {
            return redirect()->back()->with('error', 'Data Not Found!.');
        }
        return redirect()->route('indexDataMateri')->with('success', 'Data Updated successfully.');
    }

   
    public function destroy($id)
    {
        $destroy = Materi::find($id);
        if(!$destroy){
            return redirect()->route('indexDataMateri')->with('error', 'Data Not Found.');
        }

        $destroy->delete();
        if(!$destroy) {
            return redirect()->route('indexDataMateri')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexDataMateri')->with('success', 'Data Has Been Deleted.');
    }
}
