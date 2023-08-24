<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobContact;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JobContactController extends Controller
{
    use PhotoTrait;

    public function index(request $request)
    {
        if ($request->ajax()) {
            $jobs = JobContact::latest()->get();
            return DataTables::of($jobs)
                ->addColumn('action', function ($jobs) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $jobs->id . '" data-title="' . $jobs->title_ar . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                            <button class="btn btn-pill btn-info-light showBtn" data-toggle="modal" data-target="#show_modal"
                                    data-id="' . $jobs->id . '" data-title="' . $jobs->name . '">
                                    <i class="fas fa-envelope"></i>

                            </button>
                       ';
                })
                ->editColumn('created_at', function ($messages){
                    return $messages->created_at->format('Y-m-d H:i:s');
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.jobContact.index');
        }
    }


    public function delete(Request $request)
    {
        $job = JobContact::where('id', $request->id)->first();
        $job->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end delete

    public function show(JobContact $jobContact)
    {
        return view('admin.jobContact.parts.show',compact('jobContact'));
    }
}
