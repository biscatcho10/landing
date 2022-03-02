<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPageData;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LandingPageDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $type
     * @return Application|Factory|View
     */
    public function index($type)
    {
        checkType($type);
        $landingPageData = LandingPageData::firstOrCreate(
            [
                'type' => $type
            ],
            [
                "title" => "title",
                "description" => "description",
                "upload_id" => 1,
                "google_tag_manager_head" => "google_tag_manager_head",
                "google_tag_manager_body" => "google_tag_manager_body",
                "thanks_title" => "thanks_title",
                "thanks_paragraph" => "thanks_paragraph",
                "email_subject" => "email_subject",
                "email_template" => "email_template",
                "facebook_pixel" => "facebook_pixel",
                "google_analytics" => "google_analytics",
                "seo_title" => "seo_title",
                "seo_description" => "seo_description",
                "seo_keywords" => "seo_keywords",
            ]);
        return view("admin.components.landing_page_data.index", compact("landingPageData", "type"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $type = $request->type;
        $input = $request->only([
            "title",
            "description",
            "upload_id",
            "facebook_pixel",
            "google_analytics",
            "seo_title",
            "seo_description",
            "google_tag_manager_head",
            "google_tag_manager_body",
            "thanks_title",
            "thanks_paragraph",
            "email_subject",
            "email_template",
            "seo_keywords",
        ]);
        checkType($type);
        LandingPageData::where(['type' => $type])->update($input);
        return redirect()->route('landing_page_data.index', ['type' => $type])->with(['success' => __("messages.update", ["operator" => ucfirst($type) . " Settings"])]);
    }

}
