<?php

namespace App\Http\Controllers\Api\ResetPassword;

use App\Http\Controllers\Controller;
use App\Models\ResetCodePassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller{

    public function resetPassword(Request $request)
    {

        $rules = [
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|exists:reset_code_passwords,phone'
        ];

        $validator = Validator::make($request->all(), $rules, [
            'phone.exists' => 408,
        ]);

        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];

            if (is_numeric($errors)) {
                $errors_arr = [
                    406 => 'Failed,Please resent phone again in forget password',
                ];

                $code = collect($validator->errors())->flatten(1)[0];
                return self::returnResponseDataApi( null,$errors_arr[$errors] ?? 500, $code,200);
            }
            return self::returnResponseDataApi(null,$validator->errors()->first(),422);
        }


        $passwordReset = ResetCodePassword::firstWhere('phone','=',$request->phone);

        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => "The reset is expired"], 422);
        }

        $user = User::query()->where('phone',$passwordReset->phone)->first();

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $passwordReset->delete();
        return self::returnResponseDataApi(null,"password has been successfully reset",200);

    }
}
