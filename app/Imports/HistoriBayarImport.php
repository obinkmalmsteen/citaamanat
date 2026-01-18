<?php


namespace App\Imports;

use App\Models\HistoriBayar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;




class HistoriBayarImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['id_histori']) || empty($row['id_pelanggan'])) {
            return null;
        }

        $tglRealisasi = null;

        if (!empty($row['tgl_realisasi_token'])) {
            $tglRealisasi = Carbon::instance(
                Date::excelToDateTimeObject($row['tgl_realisasi_token'])
            );
        }

        HistoriBayar::where('id_histori', $row['id_histori'])
            // ->where('id_pelanggan', $row['id_pelanggan'])
            // ->whereNull('tgl_realisasi_token')
            ->update([
                'tgl_realisasi_token' => $tglRealisasi,
                'updated_at'  => now(),
                'no_token_listrik'     => $row['no_token_listrik'],
                'status_realisasi'     => $row['status_realisasi'],
            ]);
    }
}






