<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if user authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'desc' => 'required',
            'year' => 'required|integer',
            'author_id' => 'required|integer'
        ];
    }
}