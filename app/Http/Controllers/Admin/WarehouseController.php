<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WarehouseRequest;
use App\Interfaces\WarehouseInterface;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    protected WarehouseInterface $warehouseInterface;

    public function __construct(WarehouseInterface $warehouseInterface)
    {
        $this->warehouseInterface = $warehouseInterface;
    }

    public function index(Request $request)
    {
        return $this->warehouseInterface->index($request);
    }


    public function create()
    {
        return $this->warehouseInterface->create();
    }

    public function store(WarehouseRequest $request)
    {
        return $this->warehouseInterface->store($request);
    }

    public function edit(Warehouse $warehouse)
    {
        return $this->warehouseInterface->edit($warehouse);
    }

    public function update(WarehouseRequest $request, $id)
    {
        return $this->warehouseInterface->update($request, $id);
    }

    public function delete(Request $request)
    {
        return $this->warehouseInterface->delete($request);
    }
}
