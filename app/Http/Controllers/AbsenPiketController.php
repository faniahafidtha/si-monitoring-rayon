<?php

namespace App\Http\Controllers;

use App\{Absenpiket, Piket, Siswa};
use Illuminate\Http\Request;
use PDF;

class AbsenPiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absen_piket.index', [
            'nomor' => 1,
            'absenpikets' => Absenpiket::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absen_piket.create',[
            'pikets' => Piket::all()
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
            'nis' => 'required|unique:absenpikets',
            'nama' => 'required',
            'rayon' => 'required',
            'hari' => 'required',
            'kehadiran' => 'required'
        ]);

        $nis =  $request->input('nis', []);
        $nama =  $request->input('nama', []);
        $rayon =  $request->input('rayon', []);
        $hari =  $request->input('hari', []);
        $tanggal =  $request->input('tanggal', []);
        $kehadiran =  $request->input('kehadiran', []);


        $absens = [];

        for ($i=0; $i < count($nis) ; $i++) {
            $absens[] = [
                "nis" => $nis[$i],
                "nama" => $nama[$i],
                "rayon" => $rayon[$i],
                "hari" => $hari[$i],
                "tanggal" => $tanggal[$i],
                "kehadiran" => $kehadiran[$i]
            ];
        }

        // dd($absens);
        $created = Absenpiket::insert($absens);

        if($created){
            return redirect()->route("absen_piket.index")->with('notif','Absen telah di simpan');
        }else{
            return "Absen was not Created";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('absen_piket.edit', [
            'data' => Absenpiket::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Absenpiket::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('absen_piket.index')->with('notif', 'Data diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absenpiket::findOrFail($id)->delete();
        return back()->with('notif', 'Data dihapus');
    }

    public function exportPdf()
    {
        $absenpikets = Absenpiket::all();
        $pdf = PDF::loadview('absen_piket.absen_piket',compact('absenpikets'))->setPaper('A4','potrait');
        return $pdf->stream();
    }
}
