<?php

namespace App\Http\Controllers;

use App\{Siswa,Rayon};
use Illuminate\Http\Request;

use PDF;
use App\Imports\SiswasImport;
use App\Exports\SiswasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa.index', [
            'nomor' => 1,
            'siswas' => Siswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create', [
            'siswas' => new Siswa(),
            'rayons' => Rayon::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nis' => 'required|string|max:8|unique:siswas',
            'nama' => 'required|string',
            'rombel' => 'required|string',
            'rayon_id' => 'required|string'
        ]);

        $attr = $request->all();

        Siswa::create($attr);
        return redirect()->route('siswa.index')->with('notif', 'Data disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('siswa.edit', [
            'siswa'=>Siswa::findOrFail($id),
            'rayons' => Rayon::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request,[
            'nis' => 'required|string',
            'nama' => 'required|string',
            'rombel' => 'required|string',
            'rayon_id' => 'required|string'
        ]);

        $attr = $request->all();

        $siswa->update($attr);
        return redirect()->route('siswa.index')->with('notif', 'Data diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('notif','Data Berhasil Hapus');
    }

    public function export()
    {
        return Excel::download(new SiswasExport, 'siswa.xlsx');
    }

    public function cetak_pdf()
    {
        $siswas = Siswa::all();
        $pdf = PDF::loadview('siswa.siswa-pdf',compact('siswas'))->setPaper('A4','potrait');
        return $pdf->stream();
    }

    public function importExcel(Request $request)
    {
        $this->validate($request,[
            'siswa_excel' => 'required|file|mimes:xlsx',
        ]);

        Excel::import(new SiswasImport, $request->siswa_excel);
        return redirect()->route('siswa.index')->with('notif','Berhasil Import');
    }
}
