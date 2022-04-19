<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data   =   Instansi::where(function($query) use ($request){
                        if ($request->filter) {
                            $query->Where('instansi', 'like', '%'. $request->filter .'%');
                            $query->orWhere('deskripsi', 'like','%'. $request->filter .'%');
                        }})->get();

        return view('home', compact('data', 'request'));
    }

    public function store(Request $request)
    {
        if(!$request->idedit){
            $data   =   new Instansi();
        } else {
            $data   =   Instansi::find($request->idedit);
        }

        $data->instansi     =   $request->instansi;
        $data->deskripsi    =   $request->deskripsi;
        $data->save();

        return back()->with('status', 'Berhasil Simpan');
    }

    public function delete($id)
    {
        $data   =   Instansi::find($id);
        $data->delete();

        return back()->with('status', 'Berhasil Delete');
    }

    public function edit(Request $request)
    {
        return Instansi::find($request->id);

    }

}
