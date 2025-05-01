<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules = [
            "name" => [
                "required",
                "string",
                "max:255"
            ],
            "contact_no" => [
                "required",
                "digits_between:6,11",
                "numeric",
                Rule::unique("users", "contact_no")
            ],
            "category_id" => [
                "required",
                Rule::exists("categories", "id")    
            ],
            "hobbies" => [
                "required",
                "array"
            ],
            "hobbies.*" => [
                "integer",
                Rule::exists("hobbies", "id")
            ],
        ];

        if ($this->isMethod('PUT')) {
            $rules['contact_no'] = [
                "required",
                "digits_between:6,11",
                "numeric",
                Rule::unique("users", "contact_no")
                    ->ignore($this->route('user')->id),
            ];

            $rules['profile_pic'] = [
                "nullable",
                "mimes:jpg,jpeg,png",
                "max:1024"
            ];
        }

        return $rules;
    }

    public function getUserPayload()
    {
        return collect($this->all())
            ->except([
                "hobbies",
                "profile_pic"  
            ])
            ->toArray();
    }
}
