<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'sender_id' => 'required|integer|gte:1',
            'advert_id' => 'required|integer|gte:1',
            'entry' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Er is geen user_id.',
            'user_id.integer' => 'user_id is geen geheel getal.',
            'user_id.gte' => 'user_id moet minstens 1 zijn.',
            'sender_id.required' => 'Er is geen sender_id.',
            'sender_id.integer' => 'sender_id is geen geheel getal.',
            'advert_id.required' => 'Er is geen user_id.',
            'advert_id.integer' => 'user_id is geen geheel getal.',
            'advert_id.gte' => 'user_id moet minstens 1 zijn.',
            'entry.required' => 'Waar is het bericht?',
        ];
    }
}
