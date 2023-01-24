<?php

namespace App\DataTables;

use App\Models\Question;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class QuestionDataTable extends DataTable
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
        ->editColumn('id', function ($question) {
            return  $question->id;
        })
        ->editColumn('section', function ($question) {
            if ($question->sectionrel) {
                return $question->sectionrel->name;
            }else{
            return $question->section;
            }
        })
        ->editColumn('correct_answer', function ($question) {
            if ($question->correct_answer == 1) {
                return 'Yes';
            }else{
            return 'No';
            }
        })
        ->editColumn('show_third_for', function ($question) {
            if ($question->correct_answer == 1) {
                return 'Yes';
            }else{
            return 'No';
            }
        })
        ->editColumn('third_option_is', function ($question) {
            if ($question->correct_answer == 1) {
                return 'Input';
            }else{
            return 'CheckBox';
            }
        })
        ->addColumn('action', 'questions.datatables_actions')
;
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Question $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Question $model)
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
            ->addAction(['width' => '50px', 'printable' => false])
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
        $columns = [
            [
                'data' => 'id',
                'title' => 'ID',
            ],
            [
                'data' => 'section',
                'title' => 'Section',
            ],
            [
                'data' => 'question',
                'title' => 'Question',
            ],
            [
                'data' => 'score',
                'title' => 'Score',
            ],
            [
                'data' => 'correct_answer',
                'title' => 'Answer',
            ],
            [
                'data' => 'third_option',
                'title' => 'Option',
            ],
            [
                'data' => 'show_third_for',
                'title' => 'Show Option for',
            ],
            [
                'data' => 'third_option_is',
                'title' => 'Option is',
            ],
        ];

        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'questions_datatable_' . time();
    }
}
