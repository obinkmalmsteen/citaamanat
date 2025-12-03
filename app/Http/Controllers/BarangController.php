<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;





class BarangController extends Controller
{
//  public function index()
// {
//     $data = Barang::with('jenis')->orderBy('id','DESC')->get();
//    $jenis = JenisBarang::with('barang')->orderBy('nama_jenis')->get();

//     return view('admin.barang.index', compact('jenis'));
// }

public function index(Request $request)
{
    // ambil cabang yg dipilih dari query parameter
    $user = auth()->user();
    $cabang_id = $request->cabang_id;

    // --- Jika karyawan, override cabang_id ---
    if ($user->jabatan === 'Karyawan') {
        $cabang_id = $user->cabang_id;
    }

    // --- Load data barang ---
    $data = Barang::with('jenis')
        ->when($cabang_id, fn($q) => $q->where('cabang_id', $cabang_id))
        ->orderBy('id','DESC')
        ->get();

    // --- Load jenis (filter ikut cabang) ---
    $jenis = JenisBarang::with(['barang' => function($q) use ($cabang_id) {
        $q->when($cabang_id, fn($q) => $q->where('cabang_id', $cabang_id));
    }])
    ->orderBy('nama_jenis')
    ->get();

    // --- Ambil nama cabang berdasarkan ID ---
    $cabang = null;
    if ($cabang_id) {
        $cabang = \DB::table('cabang')->where('id', $cabang_id)->first();
    }

    // menu aktif
    $menu = $this->getMenuData();

    return view('admin.barang.index', compact('jenis', 'cabang_id', 'cabang', 'menu'));
}

 // ===== Method private untuk menu aktif =====
    private function getMenuData()
    {
        return [
            'title' => 'Barang',
            'menuCabang' => 'active',
        ];
    }

public function create()
{
    $jenis = JenisBarang::orderBy('nama_jenis')->get();

     // ambil menu aktif
    $menu = $this->getMenuData();
    return view('admin.barang.create', compact('jenis', 'menu'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'nama_barang' => 'required',
        'jenis_id'    => 'required|exists:jenis_barang,id',
        'stok'        => 'required|integer',
        'satuan'      => 'nullable',
        'harga'       => 'nullable|numeric',
        'keterangan'  => 'nullable',
    ]);

    // Ambil cabang_id dari user yang login
    $validated['cabang_id'] = auth()->user()->cabang_id;

    Barang::create($validated);

    return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
}


public function edit($id)
{
    $userCabang = Auth::user()->cabang_id;

    // Ambil barang sesuai ID + harus sesuai cabang user
    $barang = Barang::where('id', $id)
                    ->where('cabang_id', $userCabang)
                    ->firstOrFail();

    $jenis = JenisBarang::orderBy('nama_jenis')->get();
$menu = $this->getMenuData();
    return view('admin.barang.edit', compact('barang', 'jenis', 'menu'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'nama_barang' => 'required',
        'jenis_id' => 'required',
        'stok' => 'required|integer',
    ]);

    $barang = Barang::findOrFail($id);

    // update data
    $barang->update($request->all());

    // ambil cabang barang tersebut
    $cabang_id = $barang->cabang_id;

    // redirect kembali dengan parameter cabang_id
    return redirect()
        ->route('barang.index', ['cabang_id' => $cabang_id])
        ->with('success','Barang berhasil diperbarui.');
}


public function destroy($id)
{
    Barang::findOrFail($id)->delete();
    return redirect()->route('barang.index')->with('success','Barang berhasil dihapus.');
}

}
