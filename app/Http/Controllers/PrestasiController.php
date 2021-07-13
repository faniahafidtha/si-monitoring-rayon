<?php

namespace App\Http\Controllers;

use App\{Prestasi,Siswa,PrestasiSiswa};
use PDF;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prestasi.index',[
            'prestasis' => Prestasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prestasi.create',[
            'prestasi' => new Prestasi(),
            'siswas' => Siswa::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Prestasi $prestasi)
    {
        $this->validate($request,[
            'nama_prestasi' => 'required|string',
            'deskripsi_prestasi' => 'required|string',
            'siswa' => 'required'
        ]);

        $attr=$request->all();
        $post=$prestasi->create($attr);
        // PrestasiSiswa::where('prestasi_id', $prestasi->id)->delete();
        // dd($request['siswa']);
        foreach ($request['siswa'] as $siswa) {
            PrestasiSiswa::create([
                'prestasi_id' => $post->id,
                'siswa_id' => $siswa,
            ]);
        }
        return redirect()->route('prestasi.index')->with('notif','Data Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('prestasi.edit', [
            'prestasi' => Prestasi::findOrFail($id),
            'siswas' => Siswa::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $this->validate($request,[
            'nama_prestasi' => 'required|string',
            'deskripsi_prestasi' => 'required|string',
            'siswa' => 'required'
        ]);

        $attr=$request->all();
        $prestasi->update($attr);
        PrestasiSiswa::where('prestasi_id', $prestasi->id)->delete();
        // dd($request['siswa']);
        foreach ($request['siswa'] as $siswa) {
            PrestasiSiswa::create([
                'prestasi_id' => $prestasi->id,
                'siswa_id' => $siswa,
            ]);
        }
        return redirect()->route('prestasi.index')->with('notif','Data Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();
        return redirect()->route('prestasi.index')->with('notif','Data dihapus');
    }

    public function exportPdf(){
        $prestasis = Prestasi::all();
        $pdf = PDF::loadview('prestasi.prestasi-pdf',compact('prestasis'))->setPaper('A4','potrait');
        return $pdf->stream();
    }
}
