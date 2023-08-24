<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JobController extends Controller
{
    use PhotoTrait;

    public function index(request $request)
    {
        if ($request->ajax()) {
            $jobs = Job::latest()->get();
            return DataTables::of($jobs)
                ->addColumn('action', function ($jobs) {
                    return '
                            <button type="button" data-id="' . $jobs->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $jobs->id . '" data-title="' . $jobs->title_ar . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($jobs) {
                    return '
                    <img alt="'.$jobs->title_ar.'" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="'. asset($jobs->image) .'">
                    ';
                })
                ->addColumn('status', function ($jobs){
                    if ($jobs->status == 1){
                        return '
                    <button type="button" data-id="' . $jobs->id . '" class="btn btn-pill btn-success-light statusBtn">  الاعلان مفعل</button>
                    ';
                    } else {
                        return '
                    <button type="button" data-id="' . $jobs->id . '" class="btn btn-pill btn-danger-light statusBtn">  الاعلان موقوف</button>
                    ';
                    }
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.jobs.index');
        }
    }


    public function delete(Request $request)
    {
        $job = Job::where('id', $request->id)->first();
        if (file_exists($job->image)) {
            unlink($job->image);
        }
        $job->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end delete

    public function create()
    {
        return view('admin.jobs.parts.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        if ($request->has('image')) {
            $inputs['image'] = $this->saveImage($request->image, 'assets/uploads/jobs','photo');
        }
        if (Job::create($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.parts.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $inputs = $request->except('id');

        if ($request->has('image')) {
            if (file_exists($job->image)) {
                unlink($job->image);
            }
            $inputs['image'] = $this->saveImage($request->image, 'assets/uploads/jobs','photo');
        }
        if ($job->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    } // end edit

    public function jobStatus(Request $request)
    {
        $job = Job::find($request->id);
        ($job->status == '0') ? $job->status = '1' : $job->status = '0';
        $job->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'تم تغيير حالة الوظيفة بنجاح'
            ]);
    }
}
