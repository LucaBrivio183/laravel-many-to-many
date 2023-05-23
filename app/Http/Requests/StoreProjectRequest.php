<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'major_version' => 'required',
            'minor_version' => 'required',
            'patch_version' => 'required',
            'image' => 'nullable|image|max:2048',
            'description' => 'required',
        ];
    }
}
