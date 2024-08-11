<?php

namespace App\Http\Controllers;

use App\models\Lokasi;
use DataTables;
use Session;
use Alert;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('masterdata.lokasi.index');
    }

    public function getLokasi(Request $request)
    {
        if ($request->ajax()) {
            $lokasi = Lokasi::all();
            return DataTables::of($lokasi)
                ->editColumn('aksi', function ($lokasi) {
                    return view('partials1._action', [
                        'model' => $lokasi,
                        'form_url' => route('lokasi.destroy', $lokasi->id),
                        'edit_url' => route('lokasi.edit', $lokasi->id),
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
        return view('masterdata.lokasi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memvalidasi inputan
        $this->validate($request, [
            'nama_lokasi'       => 'required',
            ]);

        // insert data ke database
        Lokasi::create($request->all());

        Alert::success('Sukses', 'Berhasil Menambahkan Lokasi Baru');
        return redirect()->route('lokasi.index');
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
    public function edit(lokasi $lokasi)
    {
        return view('masterdata.lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        // memvalidasi inputan
        $this->validate($request, [
            'nama_lokasi'        => 'required',
              ]);

        // insert data ke database
        $lokasi->update($request->all());

        Alert::success('Sukses', 'Berhasil Mengupdate Lokasi ');
        return redirect()->route('lokasi.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->destroy($lokasi->id);
        Alert::success('Sukses', 'Berhasil Menghapus Lokasi ');
        return redirect()->route('lokasi.index');
    }
}
