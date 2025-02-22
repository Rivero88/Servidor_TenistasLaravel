<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TorneosRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:50', Rule::unique(table:'torneos',column:'nombre')->ignore($this->torneo)],
            'ciudad' => ['required', 'string', 'max:50'],
            'superficie_id' => ['required', 'integer', 'exists:superficies,id']
        ];
    }

    public function messages():array
    {
        return[
            'nombre.required'=>'El campo nombre es obligatorio.',
            'nombre.string'=>'El campo nombre debe ser una cadena de texto.',
            'nombre.max'=>'El campo nombre no debe ser mayor a :max caracteres.',
            'nombre.unique'=>'El campo nombre ya ha sido registrado.',
            'ciudad.required'=>'El campo ciudad es obligatorio.',
            'ciudad.string'=>'El campo ciudad debe ser una cadena de texto.',
            'ciudad.max'=>'La campo ciudad no debe ser mayor a :max caracteres.',
            'superficie.required'=>'El campo superficie es obligatorio.'
        ];
    }
}
