<?php

namespace App\Http\Livewire\Administrator;

use App\Helpers\StringHelper;
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
        return redirect()->route("web.administrator.company.form-create");
    }

    public function editCompany(array $data)
    {
        return redirect()->route("web.administrator.company.form-update", $data["id"]);
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
            'companies.address_post_code',
            'companies.address_street',
            'companies.address_complement',
            'companies.address_neighborhood',
            'companies.address_city',
            'companies.address_state',
            'companies.facebook',
            'companies.instagram',
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
            ->addColumn('federal_registration', fn ($company) => StringHelper::formatFederalRegistration($company->federal_registration))
            ->addColumn('email')
            ->addColumn('phone_number', fn ($company) => StringHelper::formatPhoneNumber($company->phone_number))
            ->addColumn('logo_path')
            ->addColumn('address_post_code')
            ->addColumn('address_street')
            ->addColumn('address_complement')
            ->addColumn('address_neighborhood')
            ->addColumn('address_city')
            ->addColumn('address_state')
            ->addColumn('facebook')
            ->addColumn('instagram')
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
            Column::make('Código', 'id')
                ->makeInputRange(),

            Column::make('Nome', 'name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('Nome Fantasia', 'fantasy_name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('Inscrição Federal', 'federal_registration')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('E-mail', 'email')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->clickToCopy(true),

            Column::make('Telefone', 'phone_number')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->clickToCopy(true),

            Column::make('Administrador', 'name_administrator')
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
                ->emit('editCompany', ['id' => 'id']),
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
