<?php

namespace App\Http\Controllers\Api\ResetPassword;
use App\Http\Controllers\Controller;
use App\Models\ResetCodePassword;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller{

    public function checkPhone(Request $request): JsonResponse
    {

        $rules = [
            'phone' => 'required|numeric|exists:users',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'phone.exists' => 406,
        ]);

        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];

            if (is_numeric($errors)) {
                $errors_arr = [
                    406 => 'Failed,Phone not exists',

                ];

                $code = collect($validator->errors())->flatten(1)[0];
                return self::returnResponseDataApi( null,$errors_arr[$errors] ?? 500, $code,200);
            }
            return self::returnResponseDataApi(null,$validator->errors()->first(),422);
        }
        ResetCodePassword::query()->where('phone', $request->phone)
            ->delete();

        ResetCodePassword::create(['phone' => $request->phone]);

        return self::returnResponseDataApi(null,"The phone is exists",200);

    }

}

