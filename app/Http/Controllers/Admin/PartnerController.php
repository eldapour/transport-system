<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PartnerController extends Controller
{
    use PhotoTrait;

    public function index(request $request)
    {
        if ($request->ajax()) {
            $partners = Partner::latest()->get();
            return DataTables::of($partners)
                ->addColumn('action', function ($partners) {
                    return '
                            <button type="button" data-id="' . $partners->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $partners->id . '" data-title="' . $partners->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('img', function ($partners) {
                    return '
                    <img alt="'.$partners->title_ar.'" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="'. asset($partners->img) .'">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.partners.index');
        }
    }


    public function delete(Request $request)
    {
        $partner = Partner::where('id', $request->id)->first();
        if (file_exists($partner->img)) {
            unlink($partner->img);
        }
        $partner->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end delete

    public function create()
    {
        return view('admin.partners.parts.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        if ($request->has('img')) {
            $inputs['img'] = $this->saveImage($request->img, 'assets/uploads/partners','photo');
        }
        if (Partner::create($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.parts.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $inputs = $request->except('id');

        if ($request->has('img')) {
            if (file_exists($partner->img)) {
                unlink($partner->img);
            }
            $inputs['img'] = $this->saveImage($request->img, 'assets/uploads/partners','photo');
        }
        if ($partner->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }
}
