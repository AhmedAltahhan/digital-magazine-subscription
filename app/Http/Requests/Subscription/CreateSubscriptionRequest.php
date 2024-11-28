<?php

namespace App\Http\Requests\Subscription;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateSubscriptionRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'magazine_id' => ['required', 'exists:magazines,id'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ];

        $validator->after(function ($validator) use ($reqest) {
            $start_date = Carbon::parse($reqest->start_date);
            $end_date = Carbon::parse($reqest->end_date);
            $months_diff = $end_date->diffInMonths($start_date);
            $years_diff = $end_date->diffInYears($start_date);
            if($months_diff !== 1 || $years_diff !== 1)
            {
                $validator->errors()->add('end_date', "The subscription period must  be one month or one year only");
            }
        });
    }
}
