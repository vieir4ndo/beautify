<?php

namespace App\Http\Livewire\Administrator;

use App\Models\Company;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class CompanyTable extends PowerGridComponent
{
    use ActionButton;

    /**
     * PowerGrid Header
     *
     * @return array<int, Button>
     */
    public function header(): array
    {
        return [
            Button::add('new-company')
                ->caption(__('Nova Empresa'))
                ->class('cursor-pointer block bg-indigo-500 text-white border border-gray-300 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-600 dark:border-gray-500 dark:bg-gray-500 2xl:dark:placeholder-gray-300 dark:text-gray-200 dark:text-gray-300')
                ->emit('newCompanyEvent', [])
        ];
    }

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            [
                'newCompanyEvent',
                'editCompany'
            ]
        );
    }

    public function newCompanyEvent()
    {
        return redirect()->route("web.admininistrator.company.form");
    }

    public function editCompany()
    {
        return redirect()->route("web.admininistrator.company.form");
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
     * @return Builder<\App\Models\Company>
     */
    public function datasource(): Builder
    {
        return Company::query()->leftJoin('users as user', function ($users) {
            $users->on('companies.administrator_id', '=', 'user.id');
        })->select([
            'companies.id',
            'companies.name',
            'companies.fantasy_name',
            'companies.description',
            'companies.federal_registration',
            'companies.email',
            'companies.phone_number',
            'companies.logo_path',
            'companies.adress_post_code',
            'companies.adress_street',
            'companies.adress_complement',
            'companies.adress_neighborhood',
            'companies.adress_city',
            'companies.adress_state',
            'companies.facebook',
            'companies.instragram',
            'companies.whatsapp',
            'companies.administrator_id',
            'user.name as name_administrator',
        ])->orderBy('companies.id', 'asc');
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
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('fantasy_name')
            ->addColumn('description')
            ->addColumn('federal_registration', fn ($company) => $company->getFederalRegistrationFormatted())
            ->addColumn('email')
            ->addColumn('phone_number', fn ($company) => $company->getPhoneNumberFormatted())
            ->addColumn('logo_path')
            ->addColumn('adress_post_code')
            ->addColumn('adress_street')
            ->addColumn('adress_complement')
            ->addColumn('adress_neighborhood')
            ->addColumn('adress_city')
            ->addColumn('adress_state')
            ->addColumn('facebook')
            ->addColumn('instragram')
            ->addColumn('whatsapp')
            ->addColumn('name_administrator');
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
            Column::make('CÓDIGO', 'id')
                ->makeInputRange(),

            Column::make('NOME', 'name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('NOME FANTASIA', 'fantasy_name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('INSCRIÇÃO FEDERAL', 'federal_registration')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('E-MAIL', 'email')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->clickToCopy(true),

            Column::make('TELEFONE', 'phone_number')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->clickToCopy(true),

            Column::make('ADMINISTRADOR', 'name_administrator')
                ->sortable()
                ->searchable()
                ->makeInputText(),

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
     * PowerGrid Company Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::add("edit")
                ->caption('Editar')
                ->class('cursor-pointer block bg-indigo-500 text-white border border-gray-300 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-600 dark:border-gray-500 dark:bg-gray-500 2xl:dark:placeholder-gray-300 dark:text-gray-200 dark:text-gray-300')
                ->emit('editCompany', ['uid' => 'uid']),
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
     * PowerGrid Company Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($company) => $company->id === 1)
                ->hide(),
        ];
    }
    */
}
