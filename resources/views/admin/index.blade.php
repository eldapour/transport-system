@extends('Admin/layouts/master')
@section('title')
    {{($setting->title) ?? 'الصفحة الرئيسية'}} | لوحة التحكم
@endsection
@section('page_name')
    الرئـيسية
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="">عدد الرسائل</h6>
                            <h3 class="mb-2 number-font">{{ \App\Models\Contact::count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="">عدد الفلل </h6>
                            <h3 class="mb-2 number-font">{{ \App\Models\Building::where('type','villa')->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="">عدد التاون هاوس </h6>
                            <h3 class="mb-2 number-font">{{ \App\Models\Building::where('type','house')->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">احدث الرسائل</h3>
                    <a class="card-title btn btn-sm btn-primary" href="{{ route('contact.index') }}">كل الرسائل</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover  mb-0 text-nowrap">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>الايميل</th>
                                <th>وقت الرسالة</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(DB::table('contacts')->limit(3)->get() as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->created_at }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>



@endsection
@section('js')

@endsection

