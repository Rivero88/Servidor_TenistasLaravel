<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SuperficiesRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:50', Rule::unique(table:'superficies',column:'nombre')->ignore($this->superficie)]
        ];
    }

    public function messages():array
    {
        return[
            'nombre.required'=>'El campo nombre es obligatorio.',
            'nombre.string'=>'El campo nombre debe ser una cadena de texto.',
            'nombre.max'=>'El campo nombre no debe ser mayor a :max caracteres.',
            'nombre.unique'=>'El campo nombre ya ha sido registrado.'
        ];
    }
}
