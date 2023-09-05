<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\InvoiceSettingInterface;
use Illuminate\Http\Request;

class InvoiceSettingController extends Controller
{
    protected InvoiceSettingInterface $settingInterface;

    public function __construct(InvoiceSettingInterface $settingInterface)
    {
        $this->settingInterface = $settingInterface;
    }

    public function index()
    {
        return $this->settingInterface->index();
    }

    public function update(Request $request, $id)
    {
        return $this->settingInterface->update($request, $id);
    }

}
