<?php

namespace App\Http\Controllers;

use App\Models\RequestPerbaikan;
use Illuminate\Http\Request;

class RequestPerbaikanController extends Controller
{
public function index()
{
    $user = auth()->user();

    if (strtolower($user->jabatan) === 'admin') {
        // admin melihat semua
        $data = RequestPerbaikan::latest()->get();
    } else {
        // selain admin (misal karyawan) hanya melihat request miliknya
        $data = RequestPerbaikan::where('user_id', $user->id)->latest()->get();
    }

    return view('request_perbaikan.index', compact('data'));
}



    public function create()
    {
        return view('request_perbaikan.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'area_perbaikan' => 'required',
        'jenis_kerusakan' => 'required',
        'type_perbaikan' => 'required',
        'estimasi_biaya' => 'nullable|numeric',
        'keterangan' => 'nullable',
    ]);

    // buat kode otomatis
    $validated['kode'] = 'RP-' . now()->format('YmdHis');

    // ambil user & cabang dari session (sesuai struktur sistem kamu)
    $validated['user_id'] = auth()->user()->id;
    $validated['cabang_id'] = auth()->user()->cabang_id;

    RequestPerbaikan::create($validated);

    return redirect()->route('request-perbaikan.index')
        ->with('success', 'Request perbaikan berhasil ditambahkan.');
}


    public function edit($id)
    {
        $item = RequestPerbaikan::findOrFail($id);
        return view('request_perbaikan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'area_perbaikan' => 'required',
            'jenis_kerusakan' => 'required',
            'type_perbaikan' => 'required',
            'estimasi_biaya' => 'nullable|numeric',
            'keterangan' => 'nullable',
        ]);

        RequestPerbaikan::findOrFail($id)->update($validated);

        return redirect()->route('request-perbaikan.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        RequestPerbaikan::destroy($id);
        return redirect()->route('request-perbaikan.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
