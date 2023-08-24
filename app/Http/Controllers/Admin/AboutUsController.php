<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AboutUsController extends Controller
{
    use PhotoTrait;

    public function index(request $request)
    {
            $about = AboutUs::first();

            return view('admin.about.index',compact('about'));
    }


    public function delete(Request $request)
    {
        $about = AboutUs::where('id', $request->id)->first();
        if (file_exists($about->image)) {
            unlink($about->image);
        }
        $about->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end delete

    public function create()
    {
        return view('admin.about.parts.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        if ($request->has('image')) {
            $inputs['image'] = $this->saveImage($request->image, 'assets/uploads/about','photo');
        }
        if (AboutUs::create($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function edit(AboutUs $about)
    {
        return view('admin.about.parts.edit', compact('about'));
    }

    public function update(Request $request, AboutUs $about)
    {
        $inputs = $request->except('id');

        if ($request->has('image')) {
            if (file_exists($about->image)) {
                unlink($about->image);
            }
            $inputs['image'] = $this->saveImage($request->image, 'assets/uploads/about','photo');
        }
        if ($about->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }
}
