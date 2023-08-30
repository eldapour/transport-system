<?php

namespace App\Repository;

use App\Interfaces\CityInterface;
use App\Models\City;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\DataTables;

class CityRepository implements CityInterface
{
    public function index($request)
    {
        if ($request->ajax()) {
            $city = City::query()->latest()->get();
            return DataTables::of($city)
                ->addColumn('action', function ($city) {
                    return '
                            <button type="button" data-id="' . $city->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $city->id . '" data-title="' . $city->name_ar . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.city.index');
        }
    }

    public function create()
    {
        return view('admin.city.parts.create');
    }

    public function store($request): JsonResponse
    {
        $inputs = $request->all();
        if (City::query()->create($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function edit($city)
    {
        return view('admin.city.parts.edit', compact('city'));
    }

    public function update($request, $id): JsonResponse
    {
        $inputs = $request->except('id');

        $city = City::query()->findOrFail($id);

        if ($city->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function delete($request)
    {
        $city = City::query()->where('id', $request->id)->first();

        $city->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);

    }
}
