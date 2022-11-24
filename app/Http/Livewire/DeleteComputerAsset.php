<?php

namespace App\Http\Livewire;

use App\Models\ComputerAsset;
use LivewireUI\Modal\ModalComponent;

class DeleteComputerAsset extends ModalComponent
{
    // * VARIABLE TO CALL IN THE QUERY * //
    public $computerAssets;

    public function mount($id)
    {
        // * ID IS THE PARAMETER THAT WILL BE USED IN RENDER FUNCTION * //
        // * IT ONLY GRAB THE COMPUTER ASSET THAT HAS BEEN TRASHED(FIELD: DELETED_AT != NULL) * //
        $this->computerAssets = ComputerAsset::onlyTrashed()->findOrFail($id);
    }

    public function render()
    {
        // * TO GET THE DETAILS OF SPECIFIC COMPUTER ASSET BY THEIR ID * //
        $getComputerAssets = $this->computerAssets;

        return view('livewire.delete-computer-asset', compact('getComputerAssets'));
    }
}
