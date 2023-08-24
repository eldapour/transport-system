<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' =>  (lang() == 'ar') ? 'يتطلب الاسم' : 'the name is require',
            'email.required' =>  (lang() == 'ar') ? 'يتطلب البريد الالكتروني' : 'the email is require',
            'subject.required' =>  (lang() == 'ar') ? 'يتطلب الموضوع' : 'the subject is require',
            'message.required' =>  (lang() == 'ar') ? 'يتطلب الرسالة' : 'the message is require',
            'phone.required' =>  (lang() == 'ar') ? 'يتطلب الرقم' : 'the phone is require',
            'phone.numeric' =>  (lang() == 'ar') ? 'يجب أن يكون رقم الهاتف رقمًا' : 'phone number must be number',
        ];
    }
}
