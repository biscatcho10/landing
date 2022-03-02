<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\VisitorInformationController;
use App\Models\LandingPageContact;
use App\Models\VisitorInformation;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;


class DashboardController extends Controller
{
    public function index()
    {
        $this->visitors();
        $social = LandingPageContact::where("type", "social")->count();
        $motion = LandingPageContact::where("type", "motion")->count();
        $branding = LandingPageContact::where("type", "branding")->count();
        $mobile = LandingPageContact::where("type", "mobile")->count();
        $visitors = [
            "all" => VisitorInformation::count(),
            "last30days" => VisitorInformation::whereDate("vis_lastvisit", '>', Carbon::now()->subDays(30))->count()
        ];
        return view("admin.components.dashboard.index", compact('social', 'motion', 'branding', 'mobile', "visitors"));
    }

    /**
     * @return JsonResponse
     */
    public function mapData(): JsonResponse
    {
        return response()->json(VisitorInformation::visitorsMap());
    }

    /**
     * @return JsonResponse
     */
    public function browserUsage(): JsonResponse
    {
        return response()->json(VisitorInformation::visitorsBrowser());
    }

    public function visitors()
    {
        (new VisitorInformationController)->updateLastVisit();
    }

}
