<?php

namespace App\Http\Livewire\Administrator;

use App\Models\Procedure;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridEloquent};

final class ProcedureTable extends PowerGridComponent
{
    use ActionButton;

    /*
  |--------------------------------------------------------------------------
  |  Table header
  |--------------------------------------------------------------------------
  | Configure Action Buttons for your table header.
  |

  */
    /**
     * PowerGrid Header
     *
     * @return array<int, Button>
     */
    public function header(): array
    {
        return [
            Button::add('new-procedure')
                ->caption(__('Novo Procedimento'))
                ->class('cursor-pointer block bg-indigo-500 text-white border border-gray-300 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-600 dark:border-gray-500 dark:bg-gray-500 2xl:dark:placeholder-gray-300 dark:text-gray-200 dark:text-gray-300')
                ->emit('newProcedureEvent', [])
        ];
    }

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            [
                'newProcedureEvent',
                'editProcedure'
            ]
        );
    }

    public function newProcedureEvent()
    {
        return redirect()->route("web.administrator.procedure.form");
    }

    public function editProcedure()
    {
        return redirect()->route("web.administrator.procedure.form");
    }

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        return [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Procedure>
     */
    public function datasource(): Builder
    {
        return Procedure::query()->leftJoin('companies as company', function ($companies) {
            $companies->on('procedures.company_id', '=', 'company.id');
        })->select([
            "procedures.id",
            'procedures.title',
            'procedures.description',
            'procedures.price',
            'procedures.duration',
            'company.name',
        ])->orderBy('procedures.id', 'asc');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('title')
            ->addColumn('description')
            ->addColumn('duration')
            ->addColumn('price')
            ->addColumn('name')
            ->addColumn('active', fn($procedure) => Procedure::activity()->firstWhere('active', $procedure->active)['label']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('Código', 'id')
                ->makeInputRange(),

            Column::make('Título', 'title')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('Descrição', 'description')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('Duração', 'duration')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('Preço', 'price')
                ->sortable()
                ->searchable()
                ->makeInputRange(),

            Column::make('Empresa', 'name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('Ativo', 'active')
                ->field('active', 'active')
                ->makeInputSelect(Procedure::activity(), 'label', "active")
                ->searchable(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Procedure Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::add("edit")
                ->caption('Editar')
                ->class('cursor-pointer block bg-indigo-500 text-white border border-gray-300 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-600 dark:border-gray-500 dark:bg-gray-500 2xl:dark:placeholder-gray-300 dark:text-gray-200 dark:text-gray-300')
                ->emit('editProcedure', ['uid' => 'uid']),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Procedure Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($procedure) => $procedure->id === 1)
                ->hide(),
        ];
    }
    */
}
