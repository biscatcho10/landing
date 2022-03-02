<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FromWhereListDataTable;
use App\Http\Controllers\Controller;
use App\Models\FromWhereList;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FromWhereListController extends Controller
{

    public $operator = "From Where";

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(FromWhereListDataTable $fromWhereListDataTable)
    {
        return $fromWhereListDataTable->render("admin.components.from_where_list.datatable");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $from_where = new FromWhereList();
        return view("admin.components.from_where_list.create", compact('from_where'));
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
        FromWhereList::create($input);
        return redirect()->route('from-where-list.index')->with(['success' => __("messages.add", ["operator" => $this->operator])]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $from_where = FromWhereList::find($id);
        return view("admin.components.from_where_list.edit", compact('from_where'));
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
        FromWhereList::where('id', $id)->update($input);
        return redirect()->route('from-where-list.index')->with(['success' => __("messages.update", ["operator" => $this->operator])]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $from_where = FromWhereList::find($id);
        $from_where->delete();
        return redirect()->route('from-where-list.index')->with(['success' => __("messages.delete", ["operator" => $this->operator])]);
    }
}
