<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
            'title' => 'required|min:5|max:255',
            'description' => 'required',
            'thumb' => 'url',
            'price' => 'required|max:20',
            'sale_date' => 'required',
            'series' => 'required|max:30',
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio',
            'title.min' => 'Il campo titolo deve avere almeno :min caratteri',
            'title.max' => 'Il campo titolo deve avere massimo :max caratteri',
            // 'title.unique' => 'Questo titolo è già in uso. Scegli un titolo unico.',
            'description.required' => 'Il campo descrizione è obbligatorio',
            'thumb.url' => 'Il campo thumb deve essere un URL valido',
            'price.required' => 'Il campo prezzo è obbligatorio',
            'price.max' => 'Il campo prezzo deve avere al massimo :max caratteri',
            'sale_date.required' => 'Il campo data di vendita è obbligatorio',
            'series.required' => 'Il campo serie è obbligatorio',
            'series.max' => 'Il campo serie deve avere al massimo :max caratteri',
            'type.required' => 'Il campo tipo è obbligatorio',
        ];
    }
}
