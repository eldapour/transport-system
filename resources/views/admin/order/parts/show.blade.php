<div class="modal-body">

    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <h4 class="d-flex font-weight-bold justify-content-center">معلومات الشحن</h4>
                <table class="table table-bordered">
                    <tr class="badge-success">
                        <td>من مخزن</td>
                        <td>الي مخزن</td>
                        <td>وزن الحمولة</td>
                        <td>قيمة البضاعة</td>
                        <td>الكمية</td>
                        <td>نوع الشحنة</td>
                    </tr>
                    <tr>
                        <td>{{ $offer->order->from_warehouse_place->name_ar ?? $offer->from_warehouse_place->name_ar   }}</td>
                        <td>{{ $offer->order->to_warehouse_place->name_ar ?? $offer->to_warehouse_place->name_ar   }}</td>
                        <td>{{ number_format($offer->order->weight ?? $offer->weight,1)  }} كجم</td>
                        <td>{{ number_format($offer->order->value ?? $offer->value,2)   }} $</td>
                        <td>{{  number_format($offer->order->qty ?? $offer->qty,1)   }}</td>
                        <td>{{ $offer->order->type ?? $offer->type   }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 ">
                <h4 class="d-flex font-weight-bold justify-content-center">بيانات العميل</h4>
                <table class="table table-bordered">
                    <tr class="badge-success">
                        <td>اسم العميل</td>
                        <td>هاتف العميل</td>
                        <td>البريد الالكتروني</td>
                    </tr>
                    <tr>
                        <td>{{ $offer->order->user->name ?? $offer->user->name  }}</td>
                        <td>{{ $offer->order->user->phone ?? $offer->user->phone  }}</td>
                        <td>{{ $offer->order->user->email ?? $offer->user->email  }}</td>
                    </tr>
                </table>
            </div>
            @if($offer->order)
                @if($offer->order->type != 'hanging')
                    <div class="col-12 ">
                        <h4 class="d-flex font-weight-bold justify-content-center">بيانات السائق</h4>
                        <table class="table table-bordered">
                            <tr class="badge-success">
                                <td>اسم السائق</td>
                                <td>هاتف السائق</td>
                                <td>البريد الالكتروني</td>
                            </tr>
                            <tr>
                                <td>{{ $offer->driver->name }}</td>
                                <td>{{ $offer->driver->phone }}</td>
                                <td>{{ $offer->driver->email }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-12 ">
                        <h4 class="d-flex font-weight-bold justify-content-center">بيانات التوصيل</h4>
                        <table class="table table-bordered">
                            <tr class="badge-success">
                                <td>الوقت</td>
                                <td>السعر</td>
                                <td>حالة الدفع</td>
                            </tr>
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($offer->date)->format(' Y-m-d - h:m A') }}</td>
                                <td>{{ $offer->price }}</td>
                                <td>{{ ($offer->status == 1) ? 'تم الدفع' : 'في انتظار الدفع' }}</td>
                            </tr>
                        </table>
                    </div>
            </div>
        <hr>
        <div class="row">
            <div class="col-12 ">
                <h4 for="name" class="d-flex font-weight-bold justify-content-center">تفاصيل الشحنة</h4>
                <h4 style="text-align: center;line-height: 1.7">{{ $offer->order->description }}</h4>
            </div>
        </div>
        @endif
        @endif

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="button" class="btn btn-primary">طباعة
            <i class="fa fa-print"></i>
        </button>
    </div>
</div>

<script>
    $('.dropify').dropify()
</script>
