<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Helpers\StorageSync;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        'nama_donatur'   => 'required|min:3',
        'alamat_donatur'   => 'nullable|min:3',
        'donatur_tetap'  => 'required|in:1,0',
        'logo_donatur'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'jumlah_donasi'  => 'required|integer|min:1000',
    ]);

    // upload file jika ada
if ($request->hasFile('logo_donatur')) {
    $file = $request->file('logo_donatur');
    $filename = time() . '-' . $file->getClientOriginalName();

    $file->storeAs('logo_donatur', $filename, 'public');

    $validated['logo_donatur'] = $filename;

    StorageSync::run();
}



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
        'nama_donatur'   => 'required|min:3',
        'alamat_donatur'   => 'nullable|min:3',
        'donatur_tetap'  => 'required|in:1,0',
        'logo_donatur'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'jumlah_donasi'  => 'required|integer|min:1000',
    ]);

    // jika ganti logo
    if ($request->hasFile('logo_donatur')) {
        // hapus file lama (optional)
        if ($donatur->logo_donatur && Storage::disk('public')->exists($donatur->logo_donatur)) {
            Storage::disk('public')->delete($donatur->logo_donatur);
        }

        $path = $request->file('logo_donatur')->store('logo_donatur', 'public');
        $validated['logo_donatur'] = $path;
    }

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
