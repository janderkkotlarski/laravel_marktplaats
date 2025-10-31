<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdvertRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric:strict|min:0|max:10000|decimal:0,2',
            'promoted' => 'required|size:0',
            'promoted_at' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Er is geen user_id.',
            'user_id.integer' => 'user_id is geen geheel getal.',
            'user_id.gte' => 'user_id moet minstens 1 zijn.',
            'title.required' => 'Waar is de titel?',
            'title.max' => 'Titel is langer dan 255 tekens',
            'description.required' => 'Waar is de beschrijving?',
            'price.required' => 'Waar is de prijs?',
            'price.numeric' => 'De prijs is geen getal.',
            'price.min' => 'De prijs moet minstens 0 zijn.',
            'price.max' => 'De prijs mag maximaal 10000 zijn.',
            'price.decimal' => 'De prijs mag niet meer dan 2 cijfers achter de punt hebben.',
            'promoted.required' => 'De webdesigner heeft het promotieveldje vergeten erin te doen.',
            'promoted.size' => 'De webdesigner heeft het promotieveldje niet standaard op geen gezet.',
            'promoted_at.required' => 'De webdesigner heeft de de promotiedatum er niet automatisch i'
        ];
    }
}
