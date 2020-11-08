<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id = $this->segment(2);
        return [
            'name' => "required|min:3|max:255|unique:products,name,{$id},productId",
            'quantity' => 'required',
            'value' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome deve ser preenchido',
            'quantity.required' => 'quantidade deve ser preenchido',
            'value.required' => 'valor deve ser preenchido',
        ];
    }
}
