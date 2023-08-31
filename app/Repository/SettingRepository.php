<?php

namespace App\Repository;

use App\Interfaces\SettingInterface;
use App\Models\Setting;
use App\Traits\PhotoTrait;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\DataTables;

class SettingRepository implements SettingInterface
{
    use PhotoTrait;

    public function index()
    {
            return view('admin.setting.index');
    }

    public function update($request, $id): JsonResponse
    {
        $inputs = $request->except('id');

        $setting = Setting::query()->findOrFail($id);

        if ($request->has('logo')) {
            $inputs['logo'] = $this->saveImage($request->image, 'uploads/settings', 'photo');
        } else {
            unset($request->logo);
        }

        if ($setting->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }
}
