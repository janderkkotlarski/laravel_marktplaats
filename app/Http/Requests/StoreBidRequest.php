<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBidRequest extends FormRequest
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
            'user_id' => 'required|integer|gte:1',
            'advert_user_id' => 'required|integer|gte:1',
            'advert_id' => 'required|integer|gte:1',
            'price' => 'required|numeric:strict|min:0|max:10000|decimal:0,2',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Er is geen user_id.',
            'user_id.integer' => 'user_id is geen geheel getal.',
            'user_id.gte' => 'user_id moet minstens 1 zijn.',
            'advert_user_id.required' => 'Er is geen advert_id.',
            'advert_user_id.integer' => 'advert_id is geen geheel getal.',
            'advert_user_id.gte' => 'advert_id moet minstens 1 zijn.',
            'advert_id.required' => 'Er is geen advert_id.',
            'advert_id.integer' => 'advert_id is geen geheel getal.',
            'advert_id.gte' => 'advert_id moet minstens 1 zijn.',
            'price.required' => 'Waar is het bedrag?',
            'price.numeric' => 'Het bedrag is geen getal.',
            'price.min' => 'Het bedrag moet minstens 0 zijn.',
            'price.max' => 'Het bedrag mag maximaal 10000 zijn.',
            'price.decimal' => 'Het bedrag mag niet meer dan 2 cijfers achter de punt hebben.',
        ];
    }
}
