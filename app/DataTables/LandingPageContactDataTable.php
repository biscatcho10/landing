<?php

namespace App\DataTables;

use App\Models\FromWhereList;
use App\Models\Industry;
use App\Models\LandingPageContact;
use Carbon\Carbon;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

/**
 * @property mixed|null $type
 */
class LandingPageContactDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query): DataTableAbstract
    {
        $page = "landing_page_list";
        return datatables()
            ->eloquent($query)
            ->editColumn("industry_id", function ($data) {
                if ($data->industry_id) {
                    $industries = Industry::find($data->industry_id)->pluck("name");
                    return implode(" | ", $industries->toArray());
                }
                return "";
            })
            ->editColumn("from_where_id", function ($data) {
                if ($data->from_where_id) {
                    $fromList = FromWhereList::find($data->from_where_id)->pluck("name");
                    return implode(" | ", $fromList->toArray());
                }
                return "";
            })
            ->editColumn("created_at", function ($data) {
                return Carbon::parse($data->created_at)->diffForHumans();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param LandingPageContact $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LandingPageContact $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->where("type", $this->type);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html(): Builder
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
            ->orderBy(4, "desc")
            ->buttons(
                Button::make('reset'),
                Button::make('reload'),
                Button::make('excel'),
                Button::make('csv'),
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        $cols = [];
        if ($this->type == "action") {
            $cols = [
                Column::make('name'),
                Column::make('phone_number'),
                Column::make('email'),
//                Column::make('message'),
                Column::make('company_name'),
                Column::make('industry_id')->title("Industry"),
                Column::make('from_where_id')->title("From where"),
                Column::make('created_at'),
            ];
        } else {
            $cols = [
                Column::make('name'),
                Column::make('phone_number'),
                Column::make('email'),
//                Column::make('message'),
                Column::make('company_name'),
                Column::make('created_at'),
            ];
        }
        return $cols;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'LandingPageContact_' . date('YmdHis');
    }
}
