<?php

namespace App\Http\Livewire;

use App\Models\ComputerAsset;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ComputerAssetArchiveTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('ARCHIVE_COMPUTER_ASSET')
            ->striped('f9a303')
            ->type(Exportable::TYPE_XLS,),
            Header::make()
                ->showToggleColumns()
                ->showSearchInput(),
            Footer::make()
                ->showPerPage()
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
    * @return Builder<\App\Models\ComputerAsset>
    */
    public function datasource(): Builder
    {
        return ComputerAsset::query()->onlyTrashed();
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
            ->addColumn('tag_id')
            ->addColumn('asset_category_id')
            ->addColumn('status')
            ->addColumn('created_at_formatted', fn (ComputerAsset $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (ComputerAsset $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
            Column::make('Tag ID', 'tag_id')
                ->searchable()
                ->headerAttribute('text-center text-lg')
                ->bodyAttribute('text-center font-bold text-lg')
                ->sortable(),
            Column::make('Asset Category', 'asset_category_id')
                ->searchable()
                ->headerAttribute('text-center text-lg')
                ->bodyAttribute('text-center font-bold text-lg')
                ->sortable(),
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
     * PowerGrid ComputerAsset Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::make('restore', 'Restore')
                ->class('bg-green-600 hover:bg-green-900 hover:duration-300 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm font-semibold')
                ->openModal('restore-computer-asset', ['id' => 'id']),

            Button::make('destroy', 'Delete')
                ->class('bg-red-600 hover:bg-red-900 hover:duration-300 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm font-semibold')
                ->openModal('delete-computer-asset', ['id' => 'id']),
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
     * PowerGrid ComputerAsset Action Rules.
     *
     * @return array<int, RuleActions>
     */

    public function actionRules(): array
    {
       return [
            Rule::rows()
                ->when(function($statusActive) {
                    return $statusActive->status == 0;
                })->setAttribute('class', 'bg-red-400 text-white hover:text-black')
        ];
    }
}
