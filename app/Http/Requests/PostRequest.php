<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min: 2',
            'content' => 'required|min: 3',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'ခေါင်းစဉ်ထည့်ရန်လိုအပ်သည်။',
            'content.min' => 'အကြောင်းအရာအနည်းဆုံး ၃ လုံးထည့်ပါ။'
        ];
    }
}
