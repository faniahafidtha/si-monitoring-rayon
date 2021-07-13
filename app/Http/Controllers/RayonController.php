<?php

namespace App\Http\Controllers;

use App\{Rayon,Siswa};
use Illuminate\Http\Request;

use PDF;
use App\Imports\RayonsImport;
use App\Exports\RayonsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rayon.index', [
            'nomor' => 1,
            'rayons' => Rayon::all()
        ]);
    }

    public function dataSiswa(Siswa $siswa){
        return view('rayon.data-siswa', [
            'nomor' => 1,
            'siswas' => $siswa->latest()->paginate(5),
            'rayon' => Rayon::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rayon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Rayon::create($request->all());
        return redirect()->route('rayon.index')->with('notif', 'Data disimpan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rayon::findOrFail($id)->delete();
        return back()->with('notif', 'Data dihapus');
    }

    public function export_excel()
    {
        return Excel::download(new RayonsExport, 'rayon.xlsx');
    }

    public function importExcel(Request $request)
    {
        $this->validate($request,[
            'rayon_excel' => 'required|file|mimes:xlsx',
        ]);

        Excel::import(new RayonsImport, $request->rayon_excel);
        return redirect()->route('rayon.index')->with('notif','Berhasil Import data rayon');
    }

    public function exportPdf()
    {
        $rayons = Rayon::all();
        $pdf = PDF::loadview('rayon.rayon-pdf',compact('rayons'))->setPaper('A4','potrait');
        return $pdf->stream();
    }
}
