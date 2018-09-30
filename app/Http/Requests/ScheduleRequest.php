<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'date_time' => 'required',
            'description' => 'required|min:5',
            'exams.*' => 'file|mimes:jpeg,jpg,png,pdf|max:2000'
        ];
        return $rules;
    }
}
