<?php

namespace App\Repository;

use App\Interfaces\DriverInterface;
use App\Models\City;
use App\Models\User;
use App\Traits\PhotoTrait;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\DataTables;

class DriverRepository implements DriverInterface
{
    use PhotoTrait;

    public function index($request)
    {
        if ($request->ajax()) {
            $driver = User::query()
                ->where('type', '=', 'driver')->latest()->get();
            return DataTables::of($driver)
                ->addColumn('action', function ($driver) {
                    return '
                            <button type="button" data-id="' . $driver->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $driver->id . '" data-title="' . $driver->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($driver) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($driver->image) . '">
                    ';
                })
                ->editColumn('status', function ($user) {
                    if ($user->status == 1)
                        return '<span class="btn btn-sm btn-success">مفعل</span>';
                    else
                        return '<span class="btn btn-sm btn-danger">غير مفعل</span>';
                })
                ->editColumn('city_id', function ($user) {
                    return $user->city->name_ar;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.driver.index');
        }
    }

    public function create()
    {
        $cities = City::query()->select('id', 'name_ar')->get();
        return view('admin.driver.parts.create', compact('cities'));
    }

    public function store($request): JsonResponse
    {
        $inputs = $request->all();
        $inputs['status'] = 1;
        if ($request->has('image')) {
            $inputs['image'] = $this->saveImage($request->image, 'uploads/driver', 'photo');
        }
        $inputs['password'] = Hash::make($request->password);
        if (User::query()->create($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function edit($driver)
    {
        $cities = City::query()->select('id', 'name_ar')->get();
        return view('admin.driver.parts.edit', compact('driver', 'cities'));
    }

    public function update($request, $id): JsonResponse
    {
        $inputs = $request->except('id');

        $driver = User::query()->findOrFail($id);

        if ($request->has('image')) {
            if (file_exists($driver->image)) {
                unlink($driver->image);
            }
            $inputs['image'] = $this->saveImage($request->image, 'uploads/drivers', 'photo');
        } else {
            unset($inputs['image']);
        }

        if ($request->has('password') && $request->password != null)
            $inputs['password'] = Hash::make($request->password);
        else
            unset($inputs['password']);

        if ($driver->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function delete($request)
    {
        $driver = User::query()->where('id', $request->id)->first();

        if (file_exists($driver->image)) {
            unlink($driver->image);
        }
        $driver->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);

    }
}
