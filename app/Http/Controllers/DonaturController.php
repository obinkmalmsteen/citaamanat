<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Helpers\StorageSync;
use Illuminate\Http\Request;
use App\Models\DonasiHistori;
use Illuminate\Support\Facades\Storage;

class DonaturController extends Controller
{
    public function index(Request $request)
{
    $data = [
        'title' => 'Data Donatur',
        'menuAdminDonatur' => 'active',
    ];

    // Counter GLOBAL (tidak terpengaruh filter)
    $totalDonaturTetap = Donatur::where('donatur_tetap', 1)->count();
    $totalDonaturTidakTetap = Donatur::where('donatur_tetap', 0)->count();
    $totalSemuaDonasi = DonasiHistori::sum('nominal_donasi');

    // Query utama (pakai filter)
    $donaturs = Donatur::with('donasi')
        ->when(request()->filled('donatur_tetap'), function ($query) {
            $query->where('donatur_tetap', request('donatur_tetap'));
        })
        ->latest()
        ->paginate(10)
        ->withQueryString(); // penting agar filter tidak hilang saat pagination

    return view(
        'donatur.index',
        $data,
        compact(
            'donaturs',
            'totalSemuaDonasi',
            'totalDonaturTetap',
            'totalDonaturTidakTetap'
        )
    );
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
        'donatur_tetap'  => 'required|in:1,0',
        'nama_donatur'   => 'required|min:3',
        'alamat_donatur'=> 'nullable|min:3',
        'logo_donatur'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'nominal_donasi'=> 'nullable|required_if:donatur_tetap,0|numeric|min:1',
    ]);

    // upload logo
    if ($request->hasFile('logo_donatur')) {
        $file = $request->file('logo_donatur');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->storeAs('logo_donatur', $filename, 'public');
        $validated['logo_donatur'] = $filename;
        StorageSync::run();
    }

    // simpan donatur
    $donatur = Donatur::create($validated);

    // jika BUKAN donatur tetap, langsung simpan donasi
    if ($validated['donatur_tetap'] == 0) {
        DonasiHistori::create([
            'donatur_id' => $donatur->id,
            'nominal_donasi' => $validated['nominal_donasi'],
        ]);
    }

    return redirect()->route('donatur.show', $donatur->id)
        ->with('success', 'Donatur berhasil ditambahkan');
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
        'donatur_tetap'  => 'required|in:1,0',
        'nama_donatur'   => 'required|min:3',
        'alamat_donatur'   => 'nullable|min:3',
        'logo_donatur'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        
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
    // hapus semua data anak terlebih dahulu
    $donatur->donasi()->delete();

    // hapus donatur
    $donatur->delete();

    return redirect()->route('donatur.index')
        ->with('success', 'Data donatur dan histori donasi berhasil dihapus.');
}


    public function show($id)
{
    
    $data = Donatur::with('donasi')->findOrFail($id);

    return view('donatur.show', compact('data'));
}



public function storeDonasi(Request $request, $id)
{
    $validated = $request->validate([
        'nominal_donasi' => 'required|numeric|min:1',
    ]);

    DonasiHistori::create([
        'donatur_id' => $id,
        'nominal_donasi' => $validated['nominal_donasi'],
    ]);

    return redirect()->route('donatur.show', $id)->with('success', 'Donasi berhasil ditambahkan!');
}


public function editDonasi(DonasiHistori $donasi)
{
    return view('donasi.edit', compact('donasi'));
}

public function updateDonasi(Request $request, DonasiHistori $donasi)
{
    $request->validate([
        'nominal_donasi' => 'required|numeric|min:1'
    ]);

    $donasi->update([
        'nominal_donasi' => $request->nominal_donasi
    ]);

    return redirect()
        ->route('donatur.show', $donasi->donatur_id)
        ->with('success', 'Histori donasi berhasil diperbarui.');
}


public function destroyDonasi(DonasiHistori $donasi)
{
    $donasi->delete();

    return back()->with('success', 'Histori donasi berhasil dihapus.');
}


}
