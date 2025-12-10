<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\DonasiHistori;

class PengeluaranController extends Controller
{
public function index()
{
    $data = Pengeluaran::latest()->paginate(10);

    // Total pengeluaran
    $totalSemuaPengeluaran = Pengeluaran::sum('jumlah');

    // Total donasi masuk
    $totalSemuaDonasi = DonasiHistori::sum('jumlah_donasi');

    // Hitung sisa saldo
    $sisaSaldo = $totalSemuaDonasi - $totalSemuaPengeluaran;

    return view(
        'admin.pengeluaran.index',
        compact('data', 'totalSemuaDonasi', 'totalSemuaPengeluaran', 'sisaSaldo')
    );
}


    public function create()
    {
        return view('admin.pengeluaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required',
            'deskripsi' => 'nullable',
            'jumlah' => 'required|numeric',
            'bukti' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('bukti')) {
            $validated['bukti'] = $request->file('bukti')->store('bukti_pengeluaran', 'public');
        }

        Pengeluaran::create($validated);

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil ditambahkan.');
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        return view('admin.pengeluaran.edit', compact('pengeluaran'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required',
            'deskripsi' => 'nullable',
            'jumlah' => 'required|numeric',
            'bukti' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('bukti')) {
            $validated['bukti'] = $request->file('bukti')->store('bukti_pengeluaran', 'public');
        }

        $pengeluaran->update($validated);

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil diupdate.');
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil dihapus.');
    }
}
