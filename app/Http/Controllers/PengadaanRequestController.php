<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PengadaanRequest;
use Illuminate\Support\Facades\DB;
use App\Models\PengadaanRequestItem;
use Illuminate\Support\Facades\Auth;

class PengadaanRequestController extends Controller
{
    // index: daftar request (bisa untuk user melihat request miliknya, admin melihat semua)
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->jabatan === 'Admin') {
            $requests = PengadaanRequest::with('user','items.barang')->orderBy('created_at','desc')->get();
        } else {
            // karyawan lihat hanya request miliknya (atau cabang)
            $requests = PengadaanRequest::with('items.barang')
                        ->where('user_id', $user->id)
                        ->orderBy('created_at','desc')
                        ->get();
        }



        
$menu = $this->getMenuData();
        return view('pengadaan.index', compact('requests','menu'));
    }

     // ===== Method private untuk menu aktif =====
    private function getMenuData()
    {
        return [
            'title' => 'Barang',
            'menuPengadaan' => 'active',
        ];
    }

    // show form create: kita perlu barang sesuai cabang user
    public function create(Request $request)
    {
        $user = auth()->user();

        // ambil barang di cabang user (atau semua jika admin)
        if ($user->jabatan === 'Admin') {
            $barang = Barang::with('jenis')->orderBy('nama_barang')->get();
        } else {
            $barang = Barang::with('jenis')
                ->where('cabang_id', $user->cabang_id)
                ->orderBy('nama_barang')
                ->get();
        }
$menu = $this->getMenuData();
        return view('pengadaan.create', compact('barang','menu'));
    }

    // ===== Method store untuk =====
   public function store(Request $request)
{
    $user = auth()->user();

    // 🔥 bersihkan separasi ribuan sebelum validasi
    if ($request->has('items')) {
        foreach ($request->items as $k => $it) {
            if (isset($it['harga'])) {
                $request->merge([
                    "items.$k.harga" => str_replace('.', '', $it['harga'])
                ]);
            }
        }
    }

    // validate setelah dibersihkan
    $request->validate([
        'items' => 'required|array|min:1',
        'items.*.barang_id' => 'required|exists:barang,id',
        'items.*.qty' => 'required|integer|min:1',
        'items.*.harga' => 'required|integer|min:1',
    ]);

    DB::beginTransaction();
    try {

        $kode = 'PR-' . Carbon::now()->format('Ymd') . '-' . Str::upper(Str::random(4));

        $pengadaan = PengadaanRequest::create([
            'kode' => $kode,
            'user_id' => $user->id,
            'cabang_id' => $user->cabang_id,
            'divisi' => $request->divisi ?? null,
            'status' => 'pending',
            'note' => $request->note ?? null,
        ]);

        foreach ($request->items as $it) {
            PengadaanRequestItem::create([
                'pengadaan_request_id' => $pengadaan->id,
                'barang_id' => $it['barang_id'],
                'qty' => $it['qty'],
                'harga' => $it['harga'], // sudah menjadi 500000
                'note' => $it['note'] ?? null,
            ]);
        }

        DB::commit();
        return redirect()->route('pengadaan.index')->with('success','Request pengadaan berhasil dibuat.');
    } catch (\Throwable $e) {
        DB::rollBack();
        return redirect()->back()->withInput()->with('error','Gagal membuat request: '.$e->getMessage());
    }
}

    public function show($id)
    {
        $user = auth()->user();
        $pengadaan = PengadaanRequest::with('user','items.barang')->findOrFail($id);

        // akses: jika bukan admin, hanya pemohon yang boleh melihat
        if ($user->jabatan !== 'Admin' && $pengadaan->user_id !== $user->id) {
            abort(403, 'Unauthorized');
        }
$menu = $this->getMenuData();
        return view('pengadaan.show', compact('pengadaan','menu'));
    }

    // approve (Admin)
    public function approve(Request $request, $id)
    {
        $this->authorizeActionAdmin();

        $request->validate([
            'approval_note' => 'nullable|string',
        ]);

        $pengadaan = PengadaanRequest::findOrFail($id);
        $pengadaan->status = 'approved';
        $pengadaan->approved_by = auth()->user()->nama;
        $pengadaan->approved_at = now();
        $pengadaan->approval_note = $request->approval_note ?? null;
        $pengadaan->save();

        // optional: update per-item status
        $pengadaan->items()->update(['status' => 'approved']);

        return redirect()->back()->with('success','Request disetujui.');
    }

     // reject (Admin)
    public function reject(Request $request, $id)
    {
        $this->authorizeActionAdmin();

        $request->validate([
            'approval_note' => 'required|string',
        ]);

        $pengadaan = PengadaanRequest::findOrFail($id);
        $pengadaan->status = 'rejected';
        $pengadaan->approved_by = auth()->user()->nama;
        $pengadaan->approved_at = now();
        $pengadaan->approval_note = $request->approval_note;
        $pengadaan->save();

        $pengadaan->items()->update(['status' => 'rejected']);
        
        return redirect()->back()->with('success','Request ditolak.');
    }

    protected function authorizeActionAdmin()
    {
        $user = auth()->user();
        if ($user->jabatan !== 'Admin') {
            abort(403, 'Unauthorized');
        }
    }

public function approveItems(Request $request, $id)
{
    // Ambil request beserta items
    $pengadaan = PengadaanRequest::with('items')->findOrFail($id);

    // Ambil item yang dicentang
    $itemsToApprove = $request->input('items', []);

    if(empty($itemsToApprove)){
        return back()->with('error','Pilih minimal 1 item untuk disetujui.');
    }

    // Update status tiap item yang dicentang
    foreach($pengadaan->items as $item){
        if(isset($itemsToApprove[$item->id])){
            $item->update(['status' => 'approved']); // string literal
        }
    }

    // Hitung status pengadaan keseluruhan
    $totalItems = $pengadaan->items->count();
    $approvedItems = $pengadaan->items->where('status','approved')->count();

    if ($approvedItems === 0) {
        $pengadaan->update(['status' => 'pending']); // string literal
    } elseif ($approvedItems < $totalItems) {
        $pengadaan->update(['status' => 'partially_approved']); // string literal
    } else {
        $pengadaan->update(['status' => 'approved']); // string literal
    }

    return redirect()->route('pengadaan.index')
        ->with('success','Item berhasil diapprove.');
}

public function exportPdf($id)
{
    $pengadaan = PengadaanRequest::with(['items.barang', 'user'])
        ->findOrFail($id);

    $totalRequest = 0;
    $totalApproved = 0;

    foreach ($pengadaan->items as $it) {
        $totalRequest += $it->harga * $it->qty;
        if ($it->status === 'approved') {
            $totalApproved += $it->harga * $it->qty;
        }
    }
$pengadaan = PengadaanRequest::with('cabang')->findOrFail($id);

    $pdf = PDF::loadView('pengadaan.invoice_pdf', [
        'pengadaan'      => $pengadaan,
        'totalRequest'   => $totalRequest,
        'totalApproved'  => $totalApproved,
    ])->setPaper('A4');

    return $pdf->stream('Invoice-' . $pengadaan->kode . '.pdf');

    $pdf = PDF::setOptions([
    'isHtml5ParserEnabled' => true,
    'isRemoteEnabled' => true
])->loadView('admin.pengadaan.pdf', compact('pengadaan'));

return $pdf->stream();

}





}
