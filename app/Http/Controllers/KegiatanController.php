<?php

namespace App\Http\Controllers;

use App\{Kegiatan, Rayon, Siswa,KegiatanPeserta};
use PDF;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kegiatan.index', [
            'kegiatans' => Kegiatan::all(),
            'rayons' => Rayon::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kegiatan.create', [
            'kegiatan' => new Kegiatan(),
            'rayons' => Rayon::get(),
            'siswas' => Siswa::get()
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
            'rayon_id' => 'required|string',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'jenis_kegiatan' => 'required|string',
            'peserta' => 'required',
            'hari' => 'required|date'
        ]);

        $attr=$request->all();
        $post = Kegiatan::create($attr);
        foreach ($request['peserta'] as $siswa) {
            KegiatanPeserta::create([
                'kegiatan_id' => $post->id,
                'peserta_id' => $siswa,
            ]);
        }

        return redirect()->route('kegiatan.index')->with('notif','Data Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('kegiatan.edit', [
            'kegiatan'=>Kegiatan::findOrFail($id),
            'rayons' => Rayon::get(),
            'siswas'=>Siswa::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $this->validate($request,[
            'rayon_id' => 'required|string',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'jenis_kegiatan' => 'required|string',
            'peserta' => 'required',
            'hari' => 'required|date'
        ]);

        $attr=$request->all();
        $kegiatan->update($attr);
        KegiatanPeserta::where('kegiatan_id', $kegiatan->id)->delete();
        // dd($request['peserta']);
        foreach ($request['peserta'] as $siswa) {
            KegiatanPeserta::create([
                'kegiatan_id' => $kegiatan->id,
                'peserta_id' => $siswa,
            ]);
        }

        return redirect()->route('kegiatan.index')->with('notif','Data diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('notif','Data dihapus');
    }

    public function exportPdf(){
        $kegiatans = Kegiatan::all();
        $pdf = PDF::loadview('kegiatan.kegiatan-pdf',compact('kegiatans'))->setPaper('A4','potrait');
        return $pdf->stream();
    }
}
