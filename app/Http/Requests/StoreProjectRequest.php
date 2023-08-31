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
            'name' => 'required|max:50',
            'description' => 'required|max:500'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il nome supera la lunghezza massima di :max',
            'description.required' => 'La descrizione è obbligatoria',
            'description.max' => 'La lunghezza massima consentita per la descrizione è di :max'
        ];
    }
}
