<?php

namespace App\Http\Livewire;

use App\Models\ComputerAsset;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ComputerAssetTable extends PowerGridComponent
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
            Exportable::make('COMPUTER_ASSETS')
                ->striped('f9a303')
                ->type(Exportable::TYPE_XLS,),
            Header::make()
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
        return ComputerAsset::query();
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
        $canEdit = true;
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
            Column::make('Active/Inactive', 'status')
                ->searchable()
                ->headerAttribute('text-center text-lg')
                ->bodyAttribute('text-center font-bold text-lg')
                ->toggleable($canEdit, '1', '0')
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
            Button::make('edit', 'Edit')
               ->class('bg-warning hover:bg-yellow-300 hover:duration-300 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm font-semibold')
               ->openModal('edit-computer-asset', ['id' => 'id']),

            // Button::make('destroy', 'Delete')
            //    ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
            //    ->route('computer-asset.destroy', ['computer-asset' => 'id'])
            //    ->method('delete')
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

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($computer-asset) => $computer-asset->id === 1)
                ->hide(),
        ];
    }
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

    public function onUpdatedToggleable($id, $field, $value): void
    {
        ComputerAsset::query()->find($id)->update([
            $field => $value,
        ]);
    }
}
