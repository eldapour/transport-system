<?php

namespace App\Repository;

use App\Interfaces\InvoiceSettingInterface;
use App\Models\InvoiceSetting;
use App\Traits\PhotoTrait;
use Symfony\Component\HttpFoundation\JsonResponse;

class InvoiceSettingRepository implements InvoiceSettingInterface
{
    use PhotoTrait;

    public function index()
    {
            return view('admin.setting.invoice');
    }

    public function update($request, $id): JsonResponse
    {
        $inputs = $request->except('id');

        $setting = InvoiceSetting::query()->findOrFail($id);

        if ($setting->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }
}
