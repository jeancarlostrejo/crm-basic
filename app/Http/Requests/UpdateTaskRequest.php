<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required|min:10',
            'deadline' => 'required|date',
            'status' => 'required|in:Abierto,En progreso,Cancelado,Completado',
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',
            'project_id' => 'required|exists:projects,id',
        ];
    }
}
