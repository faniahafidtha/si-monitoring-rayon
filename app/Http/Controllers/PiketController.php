<?php

namespace App\Http\Controllers;

use App\{Piket,Siswa};
use Illuminate\Http\Request;
use PDF;

class PiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('piket.index', [
            'nomor' => 1,
            'pikets' => Piket::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('piket.create',[
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
        $data = $request->all();
        Piket::create($data);
        return redirect()->route('piket.index')->with('notif', 'Data disimpan');
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
        return view('piket.edit', [
            'piket' => Piket::findOrFail($id),
            'siswas' => Siswa::get()
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
        Piket::findOrFail($id)->update($request->all());
        return redirect()->route('piket.index')->with('notif', 'Data diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Piket::findOrFail($id)->delete();
        return back()->with('notif', 'Data dihapus');
    }

    public function exportPdf()
    {
        $pikets = Piket::all();
        $pdf = PDF::loadview('piket.piket-pdf',compact('pikets'))->setPaper('A4','potrait');
        return $pdf->stream();
    }
}
