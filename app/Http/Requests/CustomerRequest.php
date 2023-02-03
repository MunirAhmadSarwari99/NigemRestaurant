<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
        return [
            'image' => ['mimes:jpeg,jpg,png', 'required'],
            'customerName' => ['string', 'required', 'max:50'],
            'phone' => ['string', 'required', 'max:11'],
            'email' => ['email', 'required', 'max:255', Rule::unique(Customer::class)->ignore($this->user()->id)],
            'address' => ['string', 'required', 'max:100'],
        ];
    }
}
