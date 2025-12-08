<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Helpers\StorageSync;
use Illuminate\Http\Request;
use App\Models\DonasiHistori;
use Illuminate\Support\Facades\Storage;

class DonaturController extends Controller
{
    public function index()
    {
         $data = [
        'title' => 'DataDonatur',
        'menuAdminDonatur' => 'active',
    ];
         $totalSemuaDonasi = DonasiHistori::sum('jumlah_donasi');
        $donaturs = Donatur::with('donasi')->paginate(10);
    return view('donatur.index', $data, compact('donaturs','totalSemuaDonasi'));
    }

   public function create()
{
    // return view('donatur.create');

    return view('donatur.create', [
        
        'title' => 'Data Donatur',
        'menuAdminDonatur' => 'active'
        ]);
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
       $data = [
        'title' => 'DataDonatur',
        'menuAdminDonatur' => 'active',
    ];
    return view('donatur.edit',$data, compact('donatur'));
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


    public function show($id)
{
    
    $data = Donatur::with('donasi')->findOrFail($id);

    return view('donatur.show', compact('data'));
}



public function storeDonasi(Request $request, $id)
{
    $validated = $request->validate([
        'jumlah_donasi' => 'required|numeric|min:1',
    ]);

    DonasiHistori::create([
        'donatur_id' => $id,
        'jumlah_donasi' => $validated['jumlah_donasi'],
    ]);

    return redirect()->route('donatur.show', $id)->with('success', 'Donasi berhasil ditambahkan!');
}


}
