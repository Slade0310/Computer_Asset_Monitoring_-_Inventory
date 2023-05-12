<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputerAssetsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tag_id' => 'required|unique:computer_assets,tag_id',
            'asset_category_id' => 'required',
            'computer_designation_id' => 'required',
            'active_status' => 'nullable',
            'designation_status' => 'nullable'
        ];
    }
}
