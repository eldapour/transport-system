<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'email' => 'required',
            'phone' => 'required|numeric',
            'salary' => 'required|numeric',
            'file' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' =>  (lang() == 'ar') ? 'يتطلب الاسم' : 'the name is require',
            'email.required' =>  (lang() == 'ar') ? 'يتطلب البريد الالكتروني' : 'the email is require',
            'salary.required' =>  (lang() == 'ar') ? 'يتطلب المرتب الحالي' : 'the current salary is require',
            'salary.numeric' =>  (lang() == 'ar') ? 'يجب أن يكون المرتب الحالي رقمًا' : 'the current salary must be number',
            'file.required' =>  (lang() == 'ar') ? 'يتطلب الملف الشحصي بصيغة (PDF)' : 'Requires personal file (PDF)',
            'phone.required' =>  (lang() == 'ar') ? 'يتطلب الرقم' : 'the phone is require',
            'phone.numeric' =>  (lang() == 'ar') ? 'يجب أن يكون رقم الهاتف رقمًا' : 'phone number must be number',
        ];
    }
}
