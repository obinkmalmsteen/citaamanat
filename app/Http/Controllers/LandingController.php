<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function redirectLanding(Request $request)
{
    $agent = $request->header('User-Agent');

    if ($this->isMobile($agent)) {
        return redirect('/mobile-landingpage');
    }

    return redirect('/landing-page');
}

private function isMobile($agent)
{
    return preg_match('/iphone|ipad|android|blackberry|opera mini|windows phone|mobile/i', $agent);
}

}
