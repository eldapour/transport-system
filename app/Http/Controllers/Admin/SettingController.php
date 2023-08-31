<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Interfaces\SettingInterface;

class SettingController extends Controller
{
    protected SettingInterface $settingInterface;

    public function __construct(SettingInterface $settingInterface)
    {
        $this->settingInterface = $settingInterface;
    }

    public function index()
    {
        return $this->settingInterface->index();
    }

    public function update(SettingRequest $request, $id)
    {
        return $this->settingInterface->update($request, $id);
    }

}
