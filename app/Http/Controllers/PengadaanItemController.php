<?php

namespace App\Http\Controllers;

use App\Models\PengadaanRequestItem;
use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengadaanItemsExport; // we'll create this
use Barryvdh\DomPDF\Facade\Pdf; // dompdf
use App\Models\PengadaanRequest;

class PengadaanItemController extends Controller
{
    public function index(Request $request)
    {
        // default per page
        $perPage = (int)$request->input('per_page', 25);

        // base query
        $query = PengadaanRequestItem::with([
            'barang:id,nama_barang',
            'request:id,kode,user_id,cabang_id,status,created_at',
            'request.user:id,nama',
            'request.cabang:id,nama_cabang',
        ])->join('pengadaan_requests as pr', 'pengadaan_request_items.pengadaan_request_id', '=', 'pr.id')
          ->select('pengadaan_request_items.*'); // keep select simple for paginate

        // filter: tanggal (range) — filter pada tanggal request created_at
        if ($request->filled('date_from')) {
            $query->whereDate('pr.created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('pr.created_at', '<=', $request->date_to);
        }

        // filter: status (status dari pengadaan_requests)
        if ($request->filled('status')) {
            $query->where('pr.status', $request->status);
        }

        // filter: cabang
        if ($request->filled('cabang_id')) {
            $query->where('pr.cabang_id', $request->cabang_id);
        }

        // search: nama barang (search di barang.nama_barang)
        if ($request->filled('q')) {
            $q = $request->q;
            $query->whereHas('barang', function($qb) use ($q) {
                $qb->where('nama_barang', 'like', "%{$q}%");
            });
        }

        // order & paginate
        $items = $query->orderBy('pengadaan_request_items.id','desc')
                       ->paginate($perPage)
                       ->appends($request->except('page'));

        // pass filters for UI
        $cabangs = Cabang::all();
        return view('pengadaan.items', compact('items','perPage','cabangs'));
    }

    /**
     * Lightweight JSON endpoint for DataTables AJAX (client-side rendering).
     * Returns items matching filters (no heavy server-side paging here).
     */
    public function data(Request $request)
    {
        $query = PengadaanRequestItem::with(['barang','request.user','request.cabang'])
            ->join('pengadaan_requests as pr', 'pengadaan_request_items.pengadaan_request_id', '=', 'pr.id')
            ->select('pengadaan_request_items.*');

        // apply same filters as index
        if ($request->filled('date_from')) $query->whereDate('pr.created_at','>=', $request->date_from);
        if ($request->filled('date_to')) $query->whereDate('pr.created_at','<=', $request->date_to);
        if ($request->filled('status')) $query->where('pr.status', $request->status);
        if ($request->filled('cabang_id')) $query->where('pr.cabang_id', $request->cabang_id);
        if ($request->filled('q')) {
            $q = $request->q;
            $query->whereHas('barang', fn($qb)=> $qb->where('nama_barang','like', "%{$q}%"));
        }

        $rows = $query->orderBy('pengadaan_request_items.id','desc')->limit(500)->get();

        // format for DataTables (simple)
        $data = $rows->map(function($item){
            return [
                'id' => $item->id,
                'request_id' => $item->pengadaan_request_id,
                'request_code' => $item->request->kode ?? null,
                'nama_barang' => $item->barang->nama_barang ?? '-',
                'qty' => $item->qty,
                'harga' => number_format($item->harga,0,',','.'),
                'total' => number_format($item->total,0,',','.'),
                'user_name' => $item->request->user->nama ?? '-',
                'cabang' => $item->request->cabang->nama_cabang ?? '-',
                'status' => $item->request->status ?? '-',
                'created_at' => $item->request->created_at ? $item->request->created_at->format('Y-m-d') : null,
            ];
        });

        return response()->json(['data' => $data]);
    }

    // Export Excel (Maatwebsite\Excel)
    public function exportExcel(Request $request)
    {
        // pass current filters via query
        $fileName = 'pengadaan_items_'.date('Ymd_His').'.xlsx';
        return Excel::download(new PengadaanItemsExport($request->all()), $fileName);
    }

    // Export PDF (dompdf)
    public function exportPdf(Request $request)
    {
        // reuse query logic (simpler: get all matching rows)
        $query = PengadaanRequestItem::with(['barang','request.user','request.cabang'])
            ->join('pengadaan_requests as pr', 'pengadaan_request_items.pengadaan_request_id', '=', 'pr.id')
            ->select('pengadaan_request_items.*');

        if ($request->filled('date_from')) $query->whereDate('pr.created_at','>=', $request->date_from);
        if ($request->filled('date_to')) $query->whereDate('pr.created_at','<=', $request->date_to);
        if ($request->filled('status')) $query->where('pr.status', $request->status);
        if ($request->filled('cabang_id')) $query->where('pr.cabang_id', $request->cabang_id);
        if ($request->filled('q')) {
            $q = $request->q;
            $query->whereHas('barang', fn($qb)=> $qb->where('nama_barang','like', "%{$q}%"));
        }
        $items = $query->orderBy('pengadaan_request_items.id','desc')->get();

        $pdf = Pdf::loadView('pengadaan.items-pdf', compact('items'));
        return $pdf->download('pengadaan_items_'.date('Ymd_His').'.pdf');
    }

    // Group per cabang: total nilai per cabang
    public function groupByCabang(Request $request)
    {
        $results = DB::table('pengadaan_request_items as pri')
            ->join('pengadaan_requests as pr', 'pri.pengadaan_request_id','=','pr.id')
            ->join('cabangs as c', 'pr.cabang_id','=','c.id')
            ->select('c.id','c.nama_cabang', DB::raw('SUM(pri.qty * pri.harga) as total_nilai'))
            ->groupBy('c.id','c.nama_cabang')
            ->orderByDesc('total_nilai')
            ->get();

        return view('pengadaan.group-cabang', compact('results'));
    }

    // summary total harga per request (group)
    public function summaryByRequest(Request $request)
    {
        $results = DB::table('pengadaan_request_items as pri')
            ->join('pengadaan_requests as pr', 'pri.pengadaan_request_id','=','pr.id')
            ->select('pr.id','pr.kode', DB::raw('SUM(pri.qty * pri.harga) as total_nilai'))
            ->groupBy('pr.id','pr.kode')
            ->orderByDesc('total_nilai')
            ->paginate(50);

        return view('pengadaan.summary-request', compact('results'));
    }
}
