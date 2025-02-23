<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TenistasRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:50', Rule::unique(table:'tenistas',column:'nombre')->ignore($this->tenista)],
            'apellidos' => ['required', 'string', 'max:50', Rule::unique(table:'tenistas',column:'apellidos')->ignore($this->tenista)],
            'mano' => ['required', 'string', 'in:diestro,zurdo'],
            'altura' => ['required', 'integer', 'min:160'],
            'anno_nacimiento' => ['required', 'integer', 'min:1950', 'max:2008'],
        ];
    }

    public function messages():array
    {
        return[
            'nombre.required'=>'El campo nombre es obligatorio.',
            'nombre.string'=>'El campo nombre debe ser una cadena de texto.',
            'nombre.max'=>'El campo nombre no debe ser mayor a :max caracteres.',
            'nombre.unique'=>'El campo nombre ya ha sido registrado.',
            'apellidos.required'=>'El campo apellidos es obligatorio.',
            'apellidos.string'=>'El campo apellidos debe ser una cadena de texto.',
            'apellidos.max'=>'La campo apellidos no debe ser mayor a :max caracteres.',
            'apellidos.unique'=>'El campo apellidos ya ha sido registrado.',
            'mano.required'=>'El campo mano es obligatorio.',
            'mano.string'=>'El campo mano debe ser una cadena de texto.',
            'mano.in'=>'El campo mano debe ser diestro o zurdo.',
            'altura.required'=>'El campo altura es obligatorio.',
            'altura.integer'=>'El campo altura debe ser un número entero.',
            'altura.min'=>'El campo altura debe ser mayor a :min.',
            'anno_nacimiento.required'=>'El campo año de nacimiento es obligatorio.',
            'anno_nacimiento.integer'=>'El campo año de nacimiento debe ser un número entero.',
            'anno_nacimiento.min'=>'El campo año de nacimiento debe ser mayor a :min.',
            'anno_nacimiento.max'=>'El campo año de nacimiento debe ser menor a :max.',
        ];
    }
}
