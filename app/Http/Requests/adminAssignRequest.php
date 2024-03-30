<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminAssignRequest extends FormRequest
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
            'customer_ids' => 'required|array',
            'customer_ids.*' => 'exists:users,id|unique:employee_client_groups,customerId',
            'employee_id' => 'required|exists:users,id',
        ];
    }
}
