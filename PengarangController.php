<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pengarang;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dapatkan data pengarang
        $ar_pengarang = DB::table('pengarang')->get();
        //arahkan data ke view Pengarang
        return view('pengarang.index', compact('ar_pengarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke hal form input
        return view('pengarang.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi upload
        if(!empty($request->foto)){
            $request->validate([
                'foto' => 'image|mimes:jpg,jpeg,png,giff|max:5048',
            ]);
            $fileName = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $fileName);
            }else{
                $fileName = '';
            }
            //1. proses validasi data
            $validasi = $request->validate(
                [
                    'nip' => 'required|unique:pegawai|numeric',
                    'nama' => 'required|max:50',
                    'email' => 'required|max:50|regex:/(.+)@(.+)\.(.+)/i',
                ],
            //2. menampilkan pesan kesalahan
                [
                    'nip.required'=>'NIP Wajib di isi',
                    'nip.unique'=>'NIP Tidak Boleh Sama',
                    'nip.numeric'=>'NIP Berupa Angka',
                    'nama.required'=>'Nama Wajib di isi',
                    'email.required'=>'Email Wajib di isi',
                    'email.regex'=>'Harus Berformat Email',
                ],
            );
    
            //3. tangkap data
            DB::table('pengarang')->insert(
                [
                    'nip' => $request->nip,
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'foto' => $fileName,
                ]
            );
    
            //4. setelah input data, arahkan ke /pegawai
            return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan.');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan detail pengarang
        $ar_pegawai = DB::table('pengarang')
        ->where('pengarang.id','=',$id)->get()
        ->first();

        return view('pengarang.show',compact('ar_pengarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit
        $data = DB::table('pengarang')->where('id','=',$id)->get();

        return view('pengarang.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('pengarang')->where('id','=',$id)->update(
            [
                'nip'=>$request->mip,
                'nama'=>$request->nama,
                'email'=>$request->email,
                'foto'=>$fileName,
            ]
        );

        return redirect('/pengarang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //hapus data
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->delete();

        return redirect()->route('pengarang.index')->with('success', 'Data Pengarang berhasil dihapus');
    }
}
