<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function index(request $request)
    {
        if ($request->ajax()) {
            $messages = Contact::latest()->get();
            return DataTables::of($messages)
                ->addColumn('action', function ($messages) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $messages->id . '" data-title="' . $messages->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                            <button class="btn btn-pill btn-info-light showBtn" data-toggle="modal" data-target="#show_modal"
                                    data-id="' . $messages->id . '" data-title="' . $messages->name . '">
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
            return view('admin.messages.index');
        }
    }


    public function delete(Request $request)
    {
        $message = Contact::where('id', $request->id)->first();
        if (file_exists($message->img)) {
            unlink($message->img);
        }
        $message->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end delete

    public function show(Contact $contact)
    {
        return view('admin.messages.parts.show',compact('contact'));
    }
}
