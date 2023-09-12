@extends('admin/layouts/master')

@section('title')
    {{($setting->name_en) ?? ''}} | الاعدادات
@endsection
@section('page_name')
    الاعدادات
@endsection
@section('content')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> اعدادات {{($setting->name_en) ?? ''}}</h3>
                </div>
                <div class="card-body">
                    <form id="updateForm" method="POST" enctype="multipart/form-data"
                          action="{{route('settingUpdate',$setting->id)}}">
                        @csrf
                        <input type="hidden" value="{{$setting->id}}" name="id">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="name" class="form-control-label">اللوجو</label>
                                    <input type="file" class="dropify" name="logo"
                                           data-default-file="{{asset($setting->logo)}}"
                                           value="{{asset($setting->logo)}}"
                                           accept="image/png,image/webp , image/gif, image/jpeg,image/jpg"/>
                                    <span
                                        class="form-text text-danger text-center">مسموح فقط بالصيغ التالية : png, gif, jpeg, jpg,webp</span>
                                </div>
                                <div class="col-6 mt-5">
                                    <label for="name_ar" class="form-control-label">اسم التطبيق بالعربية</label>
                                    <input type="text" class="form-control" value="{{ $setting->name_ar }}"
                                           name="name_ar" id="name_ar"
                                           placeholder="مثال :مخزن الرياض" required>
                                    <label for="name_en" class="form-control-label">اسم التطبيق بالانجليزية</label>
                                    <input type="text" class="form-control" value="{{ $setting->name_en }}"
                                           name="name_en" id="name_en"
                                           placeholder="مثال : Riyadh warehouse" required>
                                    <label for="lan" class="form-control-label">سعر الشحنه </label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" value="{{ $setting->shipment_price }}"
                                               name="shipment_price" id="lan" required
                                               aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">/ كيلومتر</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <label for="details_ar" class="form-control-label">الشروط والاحكام بالعربية</label>
                                <textarea class="form-control" name="conditions_ar" id="details_ar"
                                          required>{{ $setting->conditions_ar }}</textarea>
                                <label for="details_en" class="form-control-label">الشروط والاحكام بالانجليزية</label>
                                <textarea class="form-control" name="conditions_en" id="details_en"
                                          required>{{ $setting->conditions_en }}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="updateButton">تحديث</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    </div>
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script src="{{ asset('assets/ck5/ckeditor.js') }}"></script>

    <script>
        ClassicEditor.create( document.querySelector( '#details_ar' ) );
        ClassicEditor.create( document.querySelector( '#details_en' ) );
    </script>

    <script>
        $('.dropify').dropify()
        editScript();
    </script>
@endsection


