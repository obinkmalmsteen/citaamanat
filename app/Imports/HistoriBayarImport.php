<?php


namespace App\Imports;

use App\Models\HistoriBayar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Carbon\Carbon;

class HistoriBayarImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['id_histori']) || empty($row['id_pelanggan'])) {
            return null;
        }

        HistoriBayar::where('id_histori', $row['id_histori'])
            ->where('id_pelanggan', $row['id_pelanggan'])
            ->whereNull('no_token_listrik')
            ->where('status_realisasi', 0)
            ->update([
                'no_token_listrik' => $row['no_token_listrik'],
                'jumlah_realisasi_token' => $row['jumlah_realisasi_token'],
                'status_realisasi' => $row['status_realisasi'],
            ]);
    }
}



