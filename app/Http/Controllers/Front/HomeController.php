<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\JobRequest;
use App\Http\Requests\QuestRequest;
use App\Models\AboutUs;
use App\Models\Building;
use App\Models\Contact;
use App\Models\Job;
use App\Models\JobContact;
use App\Models\Partner;
use App\Models\Question;
use App\Models\Service;
use App\Models\ServiceHome;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use PhotoTrait;
    public function index()
    {
        $data['partners'] = Partner::get();
        $data['service'] = ServiceHome::first();
        return view('front.home')->with($data);
    } // end of index

    public function aboutUs()
    {
        $about_us = AboutUs::first();
        return view('front.about_us',compact('about_us'));
    } // end of about

    public function projects()
    {
        $services = Service::get();
        return view('front.projects', compact('services'));
    }

    public function project($id)
    {
        $service = Service::find($id);
        $services = Service::get();
        $projects =  Building::where('services_id',$id)->latest()->get();

        return view('front.project-singel', compact('projects','service','services'));
    }

    public function projectAll()
    {
        $services = Service::get();
        $projects =  Building::latest()->get();

        return view('front.project-all', compact('projects','services'));
    } // end

    public function projecthouse()
    {
        $services = Service::get();
        $projects =  Building::where('type','house')->get();

        return view('front.project-all', compact('projects','services'));
    } // end

    public function projectvilla()
    {
        $services = Service::get();
        $projects =  Building::where('type','villa')->get();

        return view('front.project-all', compact('projects','services'));
    } // end

    public function requestIndex()
    {
      return view('front.request');
    } // end of request

    public function requestStore(QuestRequest $request)
    {
        $inputs = $request->all();

        if(Question::create($inputs)){
            return response()->json(['status' => 200 ]);
        } else {
            return response()->json(['status' => 405 ]);
        }
    } // end of requestStore

    public function contactIndex()
    {
        return view('front.contact');
    } // end of request

    public function contactStore(ContactRequest $request)
    {
        $inputs = $request->all();

        if(Contact::create($inputs)){
            return response()->json(['status' => 200 ]);
        } else {
            return response()->json(['status' => 405 ]);
        }
    } // end of requestStore

    public function sells()
    {
        return view('front.sells');
    } // end of sells

    public function maps()
    {
        return view('front.maps');
    } // end of sells

    public function partners()
    {
        $partners = Partner::get();
        return view('front.partners', compact('partners'));
    } // end of partner

    public function jobs()
    {
        $jobs = Job::where('status','1')->get();
        return view('front.jobs',compact('jobs'));
    } // end of job

    public function jobDetails($id)
    {
        $job = Job::find($id);
        return view('front.job_details', compact('job'));
    } // end of job details

    public function jobStore(JobRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('file')) {
            $inputs['file'] = $this->saveImage($request->file, 'assets/uploads/job','pdf');
        }

        if(JobContact::create($inputs)){
            return response()->json(['status' => 200 ]);
        } else {
            return response()->json(['status' => 405 ]);
        }
    } // end of requestStore

}
