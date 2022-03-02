<?php

namespace App\DataTables;

use App\Models\FromWhereList;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FromWhereListDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query): DataTableAbstract
    {
        $page = "from-where-list";
        return datatables()
            ->eloquent($query)
            ->editColumn("created_at", function ($data) {
                return Carbon::parse($data->created_at)->diffForHumans();
            })
            ->addColumn('action', function ($data) use ($page) {
                return view('admin.components.datatable.actions', compact("data", "page"));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param FromWhereList $model
     * @return Builder
     */
    public function query(FromWhereList $model): Builder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->builder()
            ->rowId("id")
            ->setTableId('dataTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->paging(true)
            ->info()
            ->dom('Blfrtip')
            ->lengthMenu([10, 25, 50, 100])
            ->parameters([
                'stateSave' => true,
            ])
            ->buttons(
                Button::make('reset'),
                Button::make('reload'),
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('name'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(60)
                ->addClass('text-center')->width(200),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'FromWhereList_' . date('YmdHis');
    }
}
