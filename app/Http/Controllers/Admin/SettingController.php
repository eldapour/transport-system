<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\ServiceHome;
use App\Models\Setting;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use PhotoTrait;
    public function index()
    {
        $service = ServiceHome::first();
        return view('admin.setting.index',compact('service'));
    } // end of index

    public function update(Request $request, Setting $setting)
    {
        $service = ServiceHome::first();
        $inputs = $request->except('image_service','service_title_ar','service_title_en','service_desc_ar','service_desc_en');
        if($request->has('logo')){
            $inputs['logo'] = $this->saveImage($request->logo,'assets/uploads/setting','photo');
        }
        if($request->has('dark_logo')){
            $inputs['dark_logo'] = $this->saveImage($request->dark_logo,'assets/uploads/setting','photo');
        }
        if($request->has('bg_img')){
            $inputs['bg_img'] = $this->saveImage($request->bg_img,'assets/uploads/setting','photo');
        }

        if ($request->has('image_service')) {
            if (file_exists($service->image_service)) {
                unlink($service->image_service);
            }
            $service->image = $this->saveImage($request->image_service,'assets/uploads/setting','photo');
            $service->save();
        }

        ServiceHome::first()->update([
            'title_ar' =>$request->service_title_ar,
            'title_en' =>$request->service_title_en,
            'desc_ar' =>$request->service_desc_ar,
            'desc_en' =>$request->service_desc_en,
        ]);

        if($setting->update($inputs))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
    }
}
