<?php

namespace App\Http\Requests\Hrm\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
        $employeeId = $this->route('employee')->id;

        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('employees', 'email')->ignore($employeeId)],
            'phone' => 'nullable|string|max:255',
            'national_id' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'hire_date' => 'required|date',
            'address' => 'nullable|string',
            'department_id' => 'nullable|exists:departments,id',
            'job_title_id' => 'nullable|exists:job_titles,id',
            'status' => 'required|in:active,inactive,terminated',
        ];
    }
}
