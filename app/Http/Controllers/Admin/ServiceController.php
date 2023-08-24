<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    use PhotoTrait;

    public function index(request $request)
    {
        if ($request->ajax()) {
            $services = Service::latest()->get();
            return Datatables::of($services)
                ->addColumn('action', function ($services) {
                    return '
                            <button type="button" data-id="' . $services->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $services->id . '" data-title="' . $services->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($services) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="'. asset($services->image) .'">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.services.index');
        }
    }


    public function delete(Request $request)
    {
        $service = Service::where('id', $request->id)->first();
        if (file_exists($service->image || $service->logo)) {
            unlink($service->image);
        }
        $service->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end delete

    public function create()
    {
        return view('admin.services.parts.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        if ($request->has('image')) {
            $inputs['image'] = $this->saveImage($request->image, 'assets/uploads/services','photo');
        }
        if ($request->has('logo')) {
            $inputs['logo'] = $this->saveImage($request->logo, 'assets/uploads/services','photo');
        }
        if (Service::create($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function edit(Service $service)
    {
        return view('admin.services.parts.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $inputs = $request->except('id');

        if ($request->has('image')) {
            if (file_exists($service->image)) {
                unlink($service->image);
            }
            $inputs['image'] = $this->saveImage($request->image, 'assets/uploads/services','photo');
        }

        if ($request->has('logo')) {
            if (file_exists($service->logo)) {
                unlink($service->logo);
            }
            $inputs['logo'] = $this->saveImage($request->logo, 'assets/uploads/services','photo');
        }

        if ($service->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }
}
