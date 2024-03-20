<?php

namespace App\Http\Controllers;

use App\Exports\ExportFasilitas;
use App\Models\Fasilita;
use App\Models\Kondisi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = Fasilita::all();

        return view('fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kondisis = Kondisi::all();
        return view('fasilitas.create', compact('kondisis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required',
            'alamat' => 'required',
            'Pj_fasilitas' => 'required',
            'kondisi' => 'required|in:bagus,perbaikan,rusak',
        ]);
        $data = $request->all();
        try {
            $check = Fasilita::create([
                'nama_fasilitas' => $data['nama_fasilitas'],
                'alamat' => $data['alamat'],
                'Pj_fasilitas' => $data['Pj_fasilitas'],
                'kondisi_id' =>$data['kondisi']
            ]);

            return redirect()->route('fasilitas.index')->withSuccess('Great! You have added Fasilitas '.$check->nama_fasilitas);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('fasilitas.index')->withFailed('oops '.$th);

        }
    }

    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kondisis = Kondisi::All();
        $fasilita = Fasilita::find($id);
        return view('fasilitas.edit', compact('kondisis', 'fasilita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fasilita $fasilita)
    {
        $request->validate([
            'nama_fasilitas' => 'required',
            'alamat' => 'required',
            'Pj_fasilitas' => 'required',
            'kondisi' => 'required|in:bagus,perbaikan,rusak',
        ]);

        $fasilita->nama_fasilitas = $request->nama_fasilitas;
        $fasilita->alamat = $request->alamat;
        $fasilita->Pj_fasilitas = $request->Pj_fasilitas;
        $fasilita->kondisi_id = $request->kondisi;
        $fasilita->save();

        return redirect()->route('fasilitas.index')->withSuccess('Great! You have updated facility '.$fasilita->nama_fasilitas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasilita $fasilita)
    {
        $fasilita->delete();

        return redirect()->route('fasilitas.index')->withSuccess('Great! You have deleted facility '.$fasilita->nama_fasilitas);
    }

    public function pdf()
    {
        $fasilitas = Fasilita::all();

        $pdf = PDF::loadView('pdf.fasilitas', compact('fasilitas'));

        return $pdf->download('fasilitas_report.pdf');
    }

    public function excel(){
        return Excel::download(new ExportFasilitas,"fasilitas.xlsx");
    }



}
