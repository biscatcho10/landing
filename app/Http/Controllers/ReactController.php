<?php

namespace App\Http\Controllers;

use App\Models\LandingPageData;
use Illuminate\Support\Facades\Route;

class ReactController extends Controller
{
    public function show()
    {
        $routes = Route::current()->parameters();
        $setting = null;
        if ($routes == [] || $routes['path'] == 'action' || $routes['path'] == 'action/thanks') {
            $setting = LandingPageData::where("type", "action")->first();
        }
        return view("react", compact('setting'));
    }
}
