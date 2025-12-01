<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DapurController extends Controller
{
     private function getDashboardData()
    {
        $totalUser = DB::table('users')->count();
       

        return [
            'title' => 'Dashboard',
            'menuDapurDashboard' => 'active',
            'totalUser' => $totalUser,
            
        ];
    }

    public function dapurdashboard()
    {
        $data = $this->getDashboardData();
        return view('dapurdashboard', $data);
    }


}
