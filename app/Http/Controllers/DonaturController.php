<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        $donaturs = Donatur::latest()->paginate(10);
        return view('donatur.index', compact('donaturs'));
    }

    public function create()
    {
        return view('donatur.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_donatur' => 'required|min:3',
            'jumlah_donasi' => 'required|integer|min:1000',
        ]);

        Donatur::create($validated);

        return redirect()->route('donatur.index')
            ->with('success', 'Data donatur berhasil disimpan.');
    }

    public function edit(Donatur $donatur)
    {
        return view('donatur.edit', compact('donatur'));
    }

    public function update(Request $request, Donatur $donatur)
    {
        $validated = $request->validate([
            'nama_donatur' => 'required|min:3',
            'jumlah_donasi' => 'required|integer|min:1000',
        ]);

        $donatur->update($validated);

        return redirect()->route('donatur.index')
            ->with('success', 'Data donatur berhasil diperbarui.');
    }

    public function destroy(Donatur $donatur)
    {
        $donatur->delete();

        return redirect()->route('donatur.index')
            ->with('success', 'Data donatur berhasil dihapus.');
    }
}
