<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Absenkehadiran;
use Illuminate\Http\Request;
use PDF;

class AbsenRayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absen_rayon.index', [
            'nomor' => 1,
            'siswas' => Siswa::all(),
            'absenrayons' => Absenkehadiran::all()
        ]);
    }

    public function create(){
        return view('absen_rayon.create', [
            'siswas' => Siswa::all(),
            'absenrayons' => Absenkehadiran::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nis' => 'required|unique:absenkehadirans',
            'nama' => 'required',
            'rombel' => 'required',
            'status' => 'required'
        ]);

        $nis =  $request->input('nis', []);
        $nama =  $request->input('nama', []);
        $rombel =  $request->input('rombel', []);
        $rayon =  $request->input('rayon', []);;
        $tanggal =  $request->input('tanggal', []);
        $status =  $request->input('status', []);


        $absens = [];

        for ($i=0; $i < count($nis) ; $i++) {
            $absens[] = [
                "nis" => $nis[$i],
                "nama" => $nama[$i],
                "rombel" => $rombel[$i],
                "rayon" => $rayon[$i],
                "tanggal" => $tanggal[$i],
                "status" => $status[$i]
            ];
        }

        // dd($absens);
        $created = Absenkehadiran::insert($absens);

        if($created){
            return redirect()->route("absen_rayon.index")->with('notif','Unit Created successfully');
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
        return view('absen_rayon.edit', [
            'data' => Absenkehadiran::findOrFail($id)
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
        $data = Absenkehadiran::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('absen_rayon.index')->with('notif', 'Data diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absenkehadiran::findOrFail($id)->delete();
        return back()->with('notif', 'Data dihapus');
    }

    public function exportPdf()
    {
        $absenrayons = Absenkehadiran::all();
        $pdf = PDF::loadview('absen_rayon.absen-rayon-pdf',compact('absenrayons'))->setPaper('A4','potrait');
        return $pdf->stream();
    }
}
