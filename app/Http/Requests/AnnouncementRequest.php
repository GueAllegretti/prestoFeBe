<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'title' => 'required|min:5',
            'body' => 'required|min:25',
            "category_id" => "required",
            'price' => "required",
        ];
    }

    public function messages()
    {
        return [

            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve essere almeno di dieci caratteri',
            'body.required' => 'La descrizione è obbligatoria',
            'body.min' => 'Inserisci una descrizione più lunga',
            "category_id.required" => "Seleziona una categoria",
            'price.required' => 'Il prezzo è obbligatorio',
        ];
    }
}
