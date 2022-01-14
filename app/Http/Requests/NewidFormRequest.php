<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewidFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
         return [
        'documento' => 'required|min:6',
        'nombre' => 'required|min:10',
        'cola' => 'min:1',
        'ticket' => 'min:1',
            ];
    }
}
