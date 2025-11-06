<?php




namespace App\Exports;

use App\Models\HistoriBayar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HistoriBayarExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $status;

    // terima parameter status (null / '1' / '0')
    public function __construct($status = null)
    {
        $this->status = $status;
    }

    public function collection()
    {
        $query = HistoriBayar::query();

        // sesuaikan nama kolom status jika beda
        if ($this->status === '1') {
            $query->where('status_realisasi', 1);
        } elseif ($this->status === '0') {
            $query->where('status_realisasi', 0);
        }

        // pilih kolom yang mau diexport — sesuaikan kolom dengan tabel histori_bayar
        // contoh: id, id_pelanggan, tgl_bayar, jumlah, metode, status_realisasi, keterangan
        return $query->select(
            
            'id_pelanggan', 
            'tgl_request_token', 
            'nama_masjid', 
            'nama_kota', 
            'nama_provinsi', 
            'tgl_realisasi_token', 
            'no_token_listrik', 
            'jumlah_realisasi_token', 
            'status_realisasi' 
            
        )->get();
    }

    public function headings(): array
    {
        return [
           
            'id_pelanggan', 
            'tgl_request_token', 
            'nama_masjid', 
            'nama_kota', 
            'nama_provinsi', 
            'tgl_realisasi_token', 
            'no_token_listrik', 
            'jumlah_realisasi_token', 
            'status_realisasi'
            
        ];
    }
}
