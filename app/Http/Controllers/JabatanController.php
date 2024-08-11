<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use DataTables;
use Session;
use Alert;
use PDF;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('masterdata.jabatan.index');
    }

    public function getJabatan(Request $request)
    {
        if ($request->ajax()) {
            $jabatan = Jabatan::all();
            return DataTables::of($jabatan)
                ->editColumn('aksi', function ($jabatan) {
                    return view('partials._action', [
                        'model' => $jabatan,
                        'form_url' => route('jabatan.destroy', $jabatan->id),
                        'edit_url' => route('jabatan.edit', $jabatan->id),
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masterdata.jabatan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memvalidasi inputan
        $this->validate($request, [
            'nama_jabatan'       => 'required',
            'gapok_jabatan'      => 'required|numeric',
            'tunjangan_jabatan'  => 'required|numeric',
            'uang_makan_perhari' => 'required|numeric',
        ]);

        // insert data ke database
        Jabatan::create($request->all());

        Alert::success('Sukses', 'Berhasil Menambahkan Jabatan Baru');
        return redirect()->route('jabatan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        return view('masterdata.jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        // memvalidasi inputan
        $this->validate($request, [
            'nama_jabatan'        => 'required',
            'gapok_jabatan'       => 'required|numeric',
            'tunjangan_jabatan'   => 'required|numeric',
            'uang_makan_perhari'  => 'required|numeric',
        ]);

        // insert data ke database
        $jabatan->update($request->all());

        Alert::success('Sukses', 'Berhasil Mengupdate Jabatan ');
        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->destroy($jabatan->id);
        Alert::success('Sukses', 'Berhasil Menghapus Jabatan ');
        return redirect()->route('jabatan.index');
    }
public function printPdf()
{
    $jabatan = Jabatan::all();

    $pdf = PDF::loadView('masterdata.jabatan._pdf', compact('jabatan'));
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream('Data Gaji.pdf', array("Attachment" => false));
}

public function grafikJabatan()
{
   return view('masterdata.jabatan.chart');
}

public function getGrafik()
{
   $jabatan = Jabatan::select('nama_jabatan', 'gapok_jabatan')->get();
   return response()->json([
       'data' => $jabatan
   ]);
}

public function exportExcel()
    {
        $jabatan = Jabatan::all();

        return view('masterdata.jabatan._excel', compact('jabatan'));
    }
}
