<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'logo' => 'nullable',
            'conditions_ar' => 'required',
            'conditions_en' => 'required',
            'shipment_price' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => 'اسم التطبيق باللغة العربية مطلوب',
            'name_en.required' => 'اسم التطبيق باللغة الانجليزية مطلوب',
            'logo.required' => 'لوجو التطبيق مطلوب',
            'conditions_ar.required' => 'الشروط والاحكام باللغة العربية مطلوب',
            'conditions_en.required' => 'الشروط والاحكام باللغة الانجليزية مطلوب',
            'shipment_price.required' => 'سعر الشحنه مطلوب',
        ];
    }
}
