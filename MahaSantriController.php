<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\MahaSantri;

class MahaSantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dapatkan data mahasantri
        $ar_mahasantri = DB::table('mahasantri')
            ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
            ->join('dosen', 'dosen.id', '=', 'mahasantri.dosen_id')
            ->select('mahasantri.*', 'jurusan.nama', 
                    'dosen.nama AS dp')->get();
        //arahkan data ke view Mahasantri
        return view('mahasantri.index', compact('ar_mahasantri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke hal form input
        return view('mahasantri.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate(
            [
                'nama' => 'required|max:50',
                'nim' => 'required|unique:mahasantri|numeric',
                'jurusan_id' => 'required',
                'matakuliah' => 'required',
                'dosen_id' => 'required',
            ],
            [
                'nama.required'=>'Nama Wajib di isi',
                'nim.required'=>'Nim Wajib di isi',
                'nim.unique'=>'Nim Tidak Boleh Sama',
                'nim.numeric'=>'Nim Berupa Angka',
                'jurusan_id.required'=>'Jurusan_id Wajib di isi',
                'matakuliah.requires'=>'MataKuliah Wajib di isi',
                'dosen_id.required'=>'Dosen_id Wajib di isi',
            ]
        );

        DB::table('mahasantri')->insert([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan_id' => $request->jurusan_id,
            'matakuliah' => $request->matakuliah,
            'dosen_id' => $request->dosen_id,
        ]);

        return redirect()->route('mahasantri.index')->with('success', 'Data mahasantri berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ar_mahasantri = DB::table('mahasantri')
            ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
            ->join('dosen', 'dosen.id', '=', 'mahasantri.dosen_id')
            ->select('mahasantri.*', 'jurusan.nama',
                    'dosen.nama AS dp')
            ->where('mahasantri.id','=',$id)->get();
        return view('mahasantri.show',compact('ar_mahasantri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = DB::table('mahasantri')
            ->where('id','=',$id)->get();
        return view('mahasantri.form_edit',compact('mahasantri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('mahasantri')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'nim'=>$request->nim,
                'jurusan_id'=>$request->jurusan_id,
                'matakuliah'=>$request->matakuliah,
                'dosen_id'=>$request->dosen_id,
            ]
        );

        return redirect('/mahasantri');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('mahasantri')->where('id',$id)->delete();

        return redirect('/mahasantri');
    }
}
