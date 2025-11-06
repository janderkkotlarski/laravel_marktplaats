<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:64',
            'notify' => 'required|integer|numeric:strict|size:0'
        ];
    }

    public function messages(): array
    {
        return [           
            'name.required' => 'Waar is de naam?',
            'name.max' => 'Naam is langer dan 255 tekens.',
            'email.required' => 'Waar is het email adres?',
            'email.max' => 'Email is langer dan 255 tekens.',
            'email.email' => 'Dit is geen email adres',
            'email.unique' => 'Dit email is al geregistreerd',
            'password.required' => 'Waar is het wachtwoord?',
            'password.min' => 'Wachtwoord is korter dan 8 tekens.',
            'password.max' => 'Wachtwoord is langer dan 64 tekens.',
            'notify.required' => 'De beheerder heeft de notificatiemogelijkheid vergeten.',
            'notify.numeric' => 'De beheerder heeft natify geen getal gemaakt.',
            'notify.size' => 'De beheerder heeft het niet 0 gemaakt voor de juiste werking.',
        ];
    }
}
