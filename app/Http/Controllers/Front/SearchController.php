<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Job;
use App\Models\Partner;
use App\Models\Service;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;

        $output = '';

        if ($request->has('search') && $request->search != '') {
            $data = Service::where('title_en', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('title_ar', 'LIKE', '%' . $request->search . '%')
                ->get();
            foreach ($data as $item) {
                $output .= '<li class="mb-2"><a class="text-decoration-none" href="' . route('project', $item->id) . '">' . $item->title_ar . '</a></li>';
            }
        }

        if ($request->has('search') && $request->search != '') {
            $data = Building::where('title_ar', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('title_en', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('address_ar', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('address_en', 'LIKE', '%' . $request->search . '%')
                ->get();
            foreach ($data as $item) {
                if (lang() == 'ar') {
                    $output .= '<li class="mb-2"><a class="text-decoration-none" href="' . route('project', $item->services_id) . '">' . $item->title_ar . '</a></li>';
                } else {
                    $output .= '<li class="mb-2"><a class="text-decoration-none" href="' . route('project', $item->services_id) . '">' . $item->title_en . '</a></li>';
                }
            }
        }

        if ($request->has('search') && $request->search != '') {
            $data = Job::where('title_en', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('title_ar', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('desc_ar', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('desc_en', 'LIKE', '%' . $request->search . '%')
                ->where('status',1)
                ->get();
            foreach ($data as $item) {
                if (lang() == 'ar') {
                    $output .= '<li class="mb-2"><a class="text-decoration-none" href="' . route('jobDetails', $item->id) . '">' . $item->title_ar . '</a></li>';
                } else {
                    $output .= '<li class="mb-2"><a class="text-decoration-none" href="' . route('project', $item->id) . '">' . $item->title_en . '</a></li>';
                }
            }
        }

        if ($request->has('search') && $request->search != '') {
            $data = Partner::where('title_en', 'LIKE', '%' . $request->search . '%')
                ->Orwhere('title_ar', 'LIKE', '%' . $request->search . '%')
                ->get();
            foreach ($data as $item) {
                if (lang() == 'ar') {
                    $output .= '<li class="mb-2"><a class="text-decoration-none" href="' . route('partners') . '">' . $item->title_ar . '</a></li>';
                } else {
                    $output .= '<li class="mb-2"><a class="text-decoration-none" href="' . route('partners') . '">' . $item->title_en . '</a></li>';
                }
            }
        }



        return $output;
    }
}
