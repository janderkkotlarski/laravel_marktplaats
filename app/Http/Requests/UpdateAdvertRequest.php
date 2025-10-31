<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdvertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric:strict|min:0|max:10000|decimal:0,2',
            'promoted' => 'required|integer|min:0|max:1',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Waar is de titel?',
            'title.max' => 'Titel is langer dan 255 tekens',
            'description.required' => 'Waar is de beschrijving?',
            'price.required' => 'Waar is de prijs?',
            'price.numeric' => 'De prijs is geen getal.',
            'price.min' => 'De prijs moet minstens 0 zijn.',
            'price.max' => 'De prijs mag maximaal 10000 zijn.',
            'price.decimal' => 'De prijs mag niet meer dan 2 cijfers achter de punt hebben.',
            'promoted.required' => 'Een promotie aanduiding is noodzakelijk.',
            'promoted.min' => 'Promotie mag minimaal 0 zijn.',
            'promoted.max' => 'Promotie mag maximaal 1 zijn.',
        ];
    }
}
