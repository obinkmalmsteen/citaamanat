<?php

namespace App\Exports;

use App\Models\Masjid;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MasjidsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        // load relasi sesuai yang ada di model
        return Masjid::with(['province', 'regency', 'district', 'village'])->get();
    }

    /**
     * Isi baris Excel (urut sesuai headings)
     */
    public function map($masjid): array
    {
        return [
            $masjid->id_masjid,
            $masjid->id_pelanggan ?? '-',
            $masjid->nama_pelanggan ?? '-',
            $masjid->no_meteran_listrik ?? '-',
            $masjid->jenis_bangunan ?? '-',
            $masjid->nama_masjid ?? '-',
            $masjid->jenis_layanan ?? '-',
            $masjid->sesuai_id_masjid ?? '-',
            $masjid->alasan_id_berbeda ?? '-',
            $masjid->nama_ketua_dkm ?? '-',
            $masjid->telp_ketua_dkm ?? '-',
            $masjid->penerima_informasi ?? '-',
            $masjid->telp_penerima_informasi ?? '-',

            // sesuai relasi Anda
            $masjid->province->name ?? '-',   // provinsi
            $masjid->regency->name ?? '-',    // kota/kabupaten
            $masjid->district->name ?? '-',   // kecamatan
            $masjid->village->name ?? '-',    // kelurahan
            $masjid->alamat_lengkap ?? '-',

            $masjid->estimasi_biaya ?? '-',
            $masjid->kode_relawan ?? '-',
            $masjid->disetujui ?? '-',
            $masjid->keterangan ?? '-',
            $masjid->total_pengajuan ?? '-',


            $masjid->created_at?->format('Y-m-d H:i:s') ?? '-',
            $masjid->updated_at?->format('Y-m-d H:i:s') ?? '-',
        ];
    }

    /**
     * Header Excel
     */
    public function headings(): array
    {
        return [
            'ID',
            'ID Pelanggan',
            'Nama Pelanggan',
            'Nomor Meteran Listrik',
            'Jenis Bangunan',
            'Nama Masjid',
            'Jenis Layanan',
            'Keseuaian ID dgn Nama Masjid',
            'Alasan Nama ID berbeda',
            'Nama Ketua DKM',
            'Telepon Ketua DKM',
            'Nama Penerima Informasi',
            'Telepon Penerima Informasi',
            'Provinsi',
            'Kota/Kabupaten',
            'Kecamatan',
            'Kelurahan/Desa',
            'Alamat',
            'Estimasi Biaya Token',
            'Kode Relawan',
            'Status Disetujui',
            'Keterangan',
            'Berapa Kali Melakukan Pengajuan',
            'Created At',
            'Updated At',
        ];
    }
}
