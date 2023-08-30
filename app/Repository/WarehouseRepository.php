<?php

namespace App\Repository;

use App\Interfaces\WarehouseInterface;
use App\Models\City;
use App\Models\Warehouse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\DataTables;

class WarehouseRepository implements WarehouseInterface
{
    public function index($request)
    {
        if ($request->ajax()) {
            $warehouse = Warehouse::query()->latest()->get();
            return DataTables::of($warehouse)
                ->addColumn('action', function ($warehouse) {
                    return '
                            <button type="button" data-id="' . $warehouse->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $warehouse->id . '" data-title="' . $warehouse->name_ar . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('city_id', function ($user) {
                    return $user->city->name_ar;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.warehouse.index');
        }
    }

    public function create()
    {
        $cities = City::query()->select('id','name_ar')->get();
        return view('admin.warehouse.parts.create',compact('cities'));
    }

    public function store($request): JsonResponse
    {
        $inputs = $request->all();
        if (Warehouse::query()->create($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function edit($warehouse)
    {
        $cities = City::query()->select('id','name_ar')->get();
        return view('admin.warehouse.parts.edit', compact('warehouse','cities'));
    }

    public function update($request, $id): JsonResponse
    {
        $inputs = $request->except('id');

        $warehouse = Warehouse::query()->findOrFail($id);

        if ($warehouse->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function delete($request)
    {
        $warehouse = Warehouse::query()->where('id', $request->id)->first();

        $warehouse->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);

    }
}
