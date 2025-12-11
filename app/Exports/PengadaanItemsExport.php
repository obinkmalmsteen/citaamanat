<?php

namespace App\Exports;

use App\Models\PengadaanRequestItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class PengadaanItemsExport implements FromCollection, WithHeadings
{
    protected $filters;
    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = PengadaanRequestItem::with(['barang','request.user','request.cabang'])
            ->join('pengadaan_requests as pr', 'pengadaan_request_items.pengadaan_request_id', '=', 'pr.id')
            ->select('pengadaan_request_items.*');

        if (!empty($this->filters['date_from'])) $query->whereDate('pr.created_at','>=',$this->filters['date_from']);
        if (!empty($this->filters['date_to'])) $query->whereDate('pr.created_at','<=',$this->filters['date_to']);
        if (!empty($this->filters['status'])) $query->where('pr.status',$this->filters['status']);
        if (!empty($this->filters['cabang_id'])) $query->where('pr.cabang_id',$this->filters['cabang_id']);
       if ($q = $this->filters['q'] ?? false) {
    $query->whereHas('barang', fn($qb) =>
        $qb->where('nama_barang', 'like', "%{$q}%")
    );
}


        $rows = $query->orderBy('pengadaan_request_items.id','desc')->get();

        // map to array for excel
        
           $no = 1; // inisialisasi nomor urut

return $rows->map(function($item) use (&$no) {
    return [
        'No' => $no++, // nomor urut
                'request_code' => $item->request->kode ?? '',
                'cabang' => $item->request->cabang->nama_cabang ?? '',
                'user' => $item->request->user->nama ?? '',
                'nama_barang' => $item->barang->nama_barang ?? '',
                'qty' => $item->qty,
                'harga' => $item->harga,
                'total' => $item->qty * $item->harga,
                'tanggal_request' => optional($item->request->created_at)->format('Y-m-d'),
                'status' => $item->request->status ?? '',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Request ID','Request Code','Cabang','User','Nama Barang','Qty','Harga','Total','Tanggal Request','Status'
        ];
    }
}
