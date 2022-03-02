<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\IndustryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(IndustryDataTable $industryDataTable)
    {
        return $industryDataTable->render("admin.components.industry.datatable");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $industry = new Industry();
        return view("admin.components.industry.create", compact('industry'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->only("name");
        Industry::create($input);
        return redirect()->route('industries.index')->with(['success' => __("messages.add", ["operator" => "Industry"])]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $industry = Industry::find($id);
        return view("admin.components.industry.edit", compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->only("name");
        Industry::where('id', $id)->update($input);
        return redirect()->route('industries.index')->with(['success' => __("messages.update", ["operator" => "Industry"])]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Industry $industry
     * @return RedirectResponse
     */
    public function destroy(Industry $industry): RedirectResponse
    {
        $industry->delete();
        return redirect()->route('industries.index')->with(['success' => __("messages.delete", ["operator" => "Industry"])]);
    }
}
