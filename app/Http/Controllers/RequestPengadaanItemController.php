<?php

namespace App\Http\Controllers;


use App\Models\PengadaanRequestItem;


class RequestPengadaanItemController extends Controller
{
    public function index()
    {
        $items = PengadaanRequestItem::with('requestPengadaan', 'barang')
                    ->latest()
                    ->paginate(20);

        return view('pengadaan.items', compact('items'));
    }
}
