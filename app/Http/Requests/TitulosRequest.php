<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Titulos;

class TitulosRequest extends FormRequest
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
            'anno' => ['required', 'integer', 'min:1960', 'max:2025'],
            'tenista_id' => ['required', 'integer', 'exists:tenistas,id'],
            'torneo_id' => ['required', 'integer', 'exists:torneos,id'],
        ];
    }

    public function withValidator($validator){
        $validator->after(function ($validator) {
            $tenista_id = $this->input('tenista_id');
            $torneo_id = $this->input('torneo_id');
            $anno = $this->input('anno');
            // Verificar si existe un título con esta combinación: año, tenista y torneo
            $existeTitulo = Titulos::where('tenista_id', $tenista_id)
                ->where('torneo_id', $torneo_id)
                ->where('anno', $anno)
                ->exists();
            if ($existeTitulo) {
                $validator->errors()->add('torneo_id', 'El tenista ya tiene este título en este año para ese torneo.');
            }
        });
    }


    public function messages()
    {
        return [
            'anno.required' => 'El año es obligatorio.',
            'tenista_id.required' => 'El tenista es obligatorio.',
            'torneo_id.required' => 'El torneo es obligatorio.',
            'tenista_id.exists' => 'El tenista seleccionado no existe.',
            'torneo_id.exists' => 'El torneo seleccionado no existe.',
            'tenista_id.unique' => 'Ya existe un título para este tenista, torneo y año.',
        ];
    }

}
