<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\DriverInterface;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    protected DriverInterface $driverInterface;

    public function __construct(DriverInterface $driverInterface)
    {
        $this->driverInterface = $driverInterface;
    }

    public function index(Request $request)
    {
        return $this->driverInterface->index($request);
    }


    public function delete($request)
    {

    }

    public function create()
    {

    }

    public function store($request)
    {

    }

    public function edit($driver)
    {

    }

    public function update($request, $id)
    {

    }
}
