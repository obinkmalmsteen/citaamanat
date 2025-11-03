<?php


namespace App\Imports;

use App\Models\HistoriBayar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HistoriBayarImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Hanya update baris yang kolom 'no_token_listrik'-nya masih kosong
        HistoriBayar::where('id_pelanggan', $row['id_pelanggan'])
            ->whereNull('no_token_listrik')
            ->update([
                'no_token_listrik' => $row['no_token_listrik'],
                'jumlah_realisasi_token' => $row['jumlah_realisasi_token'],
                'status_realisasi' => $row['status_realisasi'],
            ]);
    }
}


