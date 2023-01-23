<?php

namespace App\DataTables;

use App\Models\AreaOfInterest;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AreaOfInterestDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        $columns = $this->getColumns();
        $dataTable = $dataTable
        ->editColumn('id', function ($interest) {
            return  $interest->id;
        })
        ->editColumn('name', function ($interest) {

            return $interest->name;
        })
        ->editColumn('referent1', function ($interest) {
            if ($interest->user1) {
                return $interest->user1->name;
            }else{
            return '';
            }
        })
        ->editColumn('referent2', function ($interest) {
            if ($interest->user2) {
                return $interest->user2->name;
            }else{
            return '';
            }
        })
        ->addColumn('action', 'area_of_interests.datatables_actions');

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AreaOfInterest $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AreaOfInterest $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            // ->parameters([
            //     'dom'       => 'Bfrtip',
            //     'stateSave' => true,
            //     'order'     => [[0, 'desc']],
            //     'buttons'   => [
            //         ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
            //     ],
            // ])
            ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'name',
            'referent1',
            'referent2',
            // 'parent_id'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'area_of_interests_datatable_' . time();
    }
}
