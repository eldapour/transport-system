<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Interfaces\DriverInterface;
use App\Models\User;
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


    public function create()
    {
        return $this->driverInterface->create();
    }

    public function store(UserRequest $request)
    {
        return $this->driverInterface->store($request);
    }

    public function edit(User $driver)
    {
        return $this->driverInterface->edit($driver);
    }

    public function update(UserRequest $request, $id)
    {
        return $this->driverInterface->update($request, $id);
    }

    public function delete(Request $request)
    {
        return $this->driverInterface->delete($request);
    }

}
