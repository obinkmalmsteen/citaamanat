<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = JenisBarang::orderBy('id', 'DESC')->get();
        

        return view('admin.jenis_barang.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenis_barang.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
            'kode_jenis' => 'nullable|string|max:50|unique:jenis_barang,kode_jenis',
            'keterangan' => 'nullable|string'
        ]);

        JenisBarang::create([
            'nama_jenis' => $request->nama_jenis,
            'kode_jenis' => $request->kode_jenis,
            'keterangan' => $request->keterangan,
        ]);

     return redirect()->route('jenis_barang.index')
        ->with('success', 'Jenis barang berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisBarang $jenis_barang)
    {
        return view('admin.jenis_barang.edit', compact('jenisBarang'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisBarang $jenis_barang)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
            'kode_jenis' => 'nullable|string|max:50|unique:jenis_barang,kode_jenis,' . $jenis_barang->id,
            'keterangan' => 'nullable|string'
        ]);

        $jenis_barang->update([
            'nama_jenis' => $request->nama_jenis,
            'kode_jenis' => $request->kode_jenis,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('jenis_barang.index')
                         ->with('success', 'Jenis barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisBarang $jenis_barang)
    {
        $jenis_barang->delete();

        return redirect()->route('jenis_barang.index')
                         ->with('success', 'Jenis barang berhasil dihapus.');
    }
}
