@extends('admin/layouts/master')
@section('title')
    {{($setting->name) ?? 'الصفحة الرئيسية'}} | لوحة التحكم
@endsection
@section('page_name')
    الرئـيسية
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-info img-card box-info-shadow">
                <div class="card-body">
                    <div class="d-flex">

                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\User::count() }}</h2>
                            <p class="text-white mb-0">  جميع المستخدمين</p></div>
                        <div class="mr-auto">
                            <i class="fe fe-users text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-info img-card box-info-shadow">
                <div class="card-body">
                    <div class="d-flex">

                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\User::where('user_type','=','person')->count() }}</h2>
                            <p class="text-white mb-0"> العملاء (الافراد)</p></div>
                        <div class="mr-auto">
                            <i class="fe fe-users text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-info img-card box-info-shadow">
                <div class="card-body">
                    <div class="d-flex">

                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\User::where('user_type','=','company')->count() }}</h2>
                            <p class="text-white mb-0"> العملاء (الشركات)</p></div>
                        <div class="mr-auto">
                            <i class="fe fe-users text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-info img-card box-info-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\User::where('type','driver')->count() }}</h2>
                            <p class="text-white mb-0"> السائقين</p></div>
                        <div class="mr-auto">
                            <i class="fe fe-users text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-success img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">

                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Order::count() }}</h2>
                            <p class="text-white mb-0"> جميع الشحنات </p></div>
                        <div class="mr-auto">
                            <i class="fe fe-truck text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-success img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Order::where('status','hanging')->count() }}</h2>
                            <p class="text-white mb-0"> الشحنات الجديدة</p></div>
                        <div class="mr-auto">
                            <i class="fe fe-truck text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-success img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Order::where('status','waiting')->count() }}</h2>
                            <p class="text-white mb-0"> الشحنات في الانتظار</p></div>
                        <div class="mr-auto">
                            <i class="fe fe-truck text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-success img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Order::where('status','complete')->count() }}</h2>
                            <p class="text-white mb-0"> الشحنات المكتملة</p></div>
                        <div class="mr-auto">
                            <i class="fe fe-truck text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary-gradient img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Admin::count() }}</h2>
                            <p class="text-white mb-0"> المشرفين</p></div>
                        <div class="mr-auto">
                            <i class="fe fe-user-check text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary-gradient img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Warehouse::count() }}</h2>
                            <p class="text-white mb-0">المخازن</p></div>
                        <div class="mr-auto">
                            <i class="fa fa-warehouse text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary-gradient img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\City::count() }}</h2>
                            <p class="text-white mb-0"> المدن</p></div>
                        <div class="mr-auto">
                            <i class="fa fa-city text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary-gradient img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Payment::where('status','approved')->sum('amount') }} $</h2>
                            <p class="text-white mb-0"> عمليات الدفع الناجحة</p></div>
                        <div class="mr-auto">
                            <i class="fe fe-credit-card text-white fs-30 ml-2 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection

