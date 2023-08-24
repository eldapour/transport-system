<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Partner;
use App\Models\Service;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BuildingController extends Controller
{
    use PhotoTrait;

    public function index(request $request)
    {
        if ($request->ajax()) {
            $buildings = Building::latest()->get();
            return DataTables::of($buildings)
                ->addColumn('action', function ($buildings) {
                    return '
                            <button type="button" data-id="' . $buildings->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $buildings->id . '" data-title="' . $buildings->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('main_img', function ($buildings) {
                    return '
                    <img alt="'.$buildings->title_ar.'" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="'. asset($buildings->main_img) .'">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.buildings.index');
        }
    }


    public function delete(Request $request)
    {
        $building = Building::where('id', $request->id)->first();
        if (file_exists($building->main_img)) {
            unlink($building->main_img);
        }
        $building->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end delete

    public function create()
    {
        $services = Service::get();
        return view('admin.buildings.parts.create',compact('services'));
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        if ($request->has('main_img')) {
            $inputs['main_img'] = $this->saveImage($request->main_img, 'assets/uploads/buildings','photo');
        }

        if($request->has('files')){
            foreach($request->file('files') as $file)
            {
                $inputs['images'][] = $this->saveImage($file,'assets/uploads/buildings','photo');
            }
        }


        if (Building::create($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function edit(Building $building)
    {
        $services = Service::get();
        return view('admin.buildings.parts.edit', compact('building','services'));
    }

    public function update(Request $request, Building $building)
    {
        $inputs = $request->except('id');

        if ($request->has('main_img')) {
            if (file_exists($building->main_img)) {
                unlink($building->main_img);
            }
            $inputs['main_img'] = $this->saveImage($request->main_img, 'assets/uploads/buildings','photo');
        }
        if ($building->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }
}
