<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSettingController extends Controller
{

public function index()
{
    return view('setting', [
        'registrationActive' => (int) setting('registration_active'),
        'mobileActive' => (int) setting('mobile_mode_active'),
        'menusettings' => 'active',
    ]);
}


    public function toggle()
    {
        $setting = Setting::where('key', 'registration_active')->first();

        $setting->update([
            'value' => $setting->value == 1 ? 0 : 1
        ]);

        return back()->with('success', 'Status registrasi diperbarui');
    }

    public function toggleMobileMode()
{
   


    $setting = Setting::where('key', 'mobile_mode_active')->first();

    $setting->update([
        'value' => $setting->value == 1 ? 0 : 1
    ]);

    return back()->with('success', 'Status mobile mode berhasil diubah');
}

}

