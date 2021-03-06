<?php

namespace TaskLoan\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'role' => ['required', 'in:student,taskmaster'],
            'mobileNumber' => ['required', 'regex:/^09[0-9]{9}$/', 'unique:users,mobile_number'],
            'password' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required'],
            'address' => ['required'],
            'school' => ['required_if:role,student'],
        ];
    }
}
