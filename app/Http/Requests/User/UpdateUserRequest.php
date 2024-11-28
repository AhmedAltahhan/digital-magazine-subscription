<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'id' => ['required',Rule::exists('users','id')],
            'email' => ['required',Rule::unique('users', 'email')->ignore($this->id,"id"),'email'],
            'password' => ['required','min:8'],
            'name' => ['required','string'],
            'type' => ['required','in:manager,publisher,subscriber'],
        ];
    }
}
