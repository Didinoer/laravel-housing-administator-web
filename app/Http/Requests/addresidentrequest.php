<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addresidentrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'phone_number' =>'required|unique:residents',
        'house_number' =>'required|max:3',
        'name' =>'required',
        'block_id' =>'required'
        ];
    }


    public function attributes()
    {
    return ['block_id' => 'block name'];
    }
}
