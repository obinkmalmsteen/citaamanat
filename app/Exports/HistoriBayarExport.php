<?php

namespace App\Exports;

use App\Models\HistoriBayar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class HistoriBayarExport implements 
    FromCollection, 
    WithHeadings, 
    ShouldAutoSize, 
    WithColumnFormatting, 
    WithMapping
{
    protected $status;

    public function __construct($status = null)
    {
        $this->status = $status;
    }

    public function collection()
    {
        $query = HistoriBayar::query();

        if ($this->status === '1') {
            $query->where('status_realisasi', 1);
        } elseif ($this->status === '0') {
            $query->where('status_realisasi', 0);
        }

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

    public function map($row): array
    {
        return [
            "'" . $row->id_pelanggan,        // dipaksa text
            $row->tgl_request_token,
            $row->nama_masjid,
            $row->nama_kota,
            $row->nama_provinsi,
            $row->tgl_realisasi_token,
            "'" . $row->no_token_listrik,    // dipaksa text
            $row->jumlah_realisasi_token,
            $row->status_realisasi,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
