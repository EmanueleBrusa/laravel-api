<?php

namespace App\Http\Requests\Lead;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class LeadStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        Log::info($this);
        return [
            'name' => 'required|max:255',
            'email' => 'required|email'
        ];
    }
}
