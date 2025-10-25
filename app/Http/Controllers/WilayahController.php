<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
   
    public function publicForm()
    {
        // Ambil daftar provinsi
        $provinces = DB::connection('wilayah_indonesia')->table('reg_provinces')->get();

        return view('masjid.public_form', compact('provinces'));
    }

    public function getRegencies($province_id)
    {
        $regencies = DB::connection('wilayah_indonesia')->table('reg_regencies')
            ->where('province_id', $province_id)
            ->get();

        return response()->json($regencies);
    }

    public function getDistricts($regency_id)
    {
        $districts = DB::connection('wilayah_indonesia')->table('reg_districts')
            ->where('regency_id', $regency_id)
            ->get();

        return response()->json($districts);
    }

    public function getVillages($district_id)
    {
        $villages = DB::connection('wilayah_indonesia')->table('reg_villages')
            ->where('district_id', $district_id)
            ->get();

        return response()->json($villages);
    }
}
