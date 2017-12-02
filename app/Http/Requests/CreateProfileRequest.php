<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
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
        return [
            'role' => 'required|in:institution,volunteer',
            'address' => 'required_if:role,institution',
            'city' => 'required_if:role,institution',
            'address' => 'required_if:role,institution',
            'phone' => 'required_if:role,volunteer',
        ];
    }
}
