<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone' => 'required|numeric',
            'price' => 'required|numeric',
            'salary' => 'required|numeric',
            'financial' => 'required',
            'supported' =>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' =>  (lang() == 'ar') ? 'يتطلب الاسم' : 'the name require',
            'phone.numeric' =>  (lang() == 'ar') ? 'يجب أن يكون رقم الهاتف رقمًا' : 'phone number must be number',
            'price.numeric' =>  (lang() == 'ar') ? 'يجب أن تكون القوة الشرائية عددًا' : 'Purchasing power must be number',
            'salary.numeric' =>  (lang() == 'ar') ? 'يجب أن يكون الراتب رقمًا' : 'Salary must be number',
            'phone.required' =>  (lang() == 'ar') ? 'رقم الهاتف مطلوب' : 'phone number is require',
            'price.required' =>  (lang() == 'ar') ? 'القوة الشرائية مطلوبة' : 'Purchasing power is require',
            'salary.required' =>  (lang() == 'ar') ? 'الراتب مطلوب' : 'Salary is require',
            'financial.required' =>  (lang() == 'ar') ? 'مطلوب الالتزامات المالية' : 'financial obligations is require',
            'supported.required' => (lang() == 'ar') ? 'بدعم من وزارة الإسكان مطلوب' : 'supported by the Ministry of Housing is require',
        ];
    }
}
