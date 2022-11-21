<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\AssetCategory;
use App\Models\ComputerAsset;
use LivewireUI\Modal\ModalComponent;

class RemoveComputerAsset extends ModalComponent
{
    // * VARIABLE TO CALL IN THE QUERY * //
    public $computerAssets;

    public function mount($id)
    {
        // * ID IS THE PARAMETER THAT WILL BE USED IN RENDER FUNCTION * //
        $this->computerAssets = ComputerAsset::find($id);
    }

    public function render(Admin $admin, AssetCategory $assetCategory)
    {
        // * CURRENTLY EMAIL SESSION BY ADMIN
        $adminEmail = ['adminEmail' => $admin->where('id', session('adminEmail'))->first()];
        $getComputerAssets = $this->computerAssets;

        return view('livewire.remove-computer-asset', $adminEmail, compact('getComputerAssets'));
    }
}
