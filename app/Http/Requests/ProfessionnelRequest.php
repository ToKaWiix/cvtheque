<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfessionnelRequest extends FormRequest
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
        $id = $this->route('professionnel');

        return [
            'prenom' => ['required', 'string', 'max:25'],
            'nom' => ['required', 'string', 'max:40'],
            'cp' => ['required', 'string', 'size:5'],
            'ville' => ['required', 'string', 'max:40'],
            'telephone' => ['required', 'string', 'max:14'],
            'email' => [
                'required',
                'string',
                'max:255',
                'email:rfc,dns',
                Rule::unique('professionnels')->ignore($id),
            ],
            'naissance' => ['required', 'date_format:Y-m-d'],
            'formation' => ['required'],
            'domaine' => ['required'],
            'observation' => ['required'],
            'metier_id' => ['required'],
            'cv' => ['file', 'sometimes', 'nullable', 'mimes:pdf', 'max:2048'],
        ];
    }
}
