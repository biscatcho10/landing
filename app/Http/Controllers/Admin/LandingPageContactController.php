<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LandingPageContactDataTable;
use App\Http\Controllers\Controller;
use App\Models\LandingPageContact;
use Illuminate\Http\RedirectResponse;

class LandingPageContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index($type, LandingPageContactDataTable $landingPageContactDataTable)
    {

        return $landingPageContactDataTable->with('type', $type)->render("admin.components.landing_page_contact.datatable", compact('type'));
    }

    /**
     * @param $type
     * @param $id
     * @param LandingPageContact $landingPageContact
     * @return RedirectResponse
     */
    public function destroy($type, $id, LandingPageContact $landingPageContact): RedirectResponse
    {
        LandingPageContact::where(["id" => $id])->delete();
        return redirect()->route('landing_page_list.index', ['type' => $type])->with(['success' => __("messages.delete", ["operator" => ucfirst($type) . " Contact"])]);
    }
}
