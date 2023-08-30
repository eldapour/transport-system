<?php

namespace App\Repository\Api\Driver;
use App\Http\Resources\OrderDriverDetailResource;
use App\Http\Resources\OrderResource;
use App\Interfaces\Api\Driver\OrderRepositoryInterface;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Setting;
use App\Repository\ResponseApi;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class OrderRepository extends ResponseApi implements OrderRepositoryInterface {

    public function allOrdersOfDriver(): JsonResponse
    {

        $allOfOrdersHanging = Order::query()
            ->where('status','=','hanging')
            ->get();

        $ordersOfDriverWaiting = Order::query()
            ->whereHas('offer', fn(Builder $builder) =>
            $builder->where('driver_id','=',Auth::guard('user-api')->id())
            )
            ->where('status','=','waiting')
            ->get();

        if(request('search') == 'hanging'){

            $data['allOfOrdersHanging'] = OrderResource::collection($allOfOrdersHanging);
            return self::returnResponseDataApi($data,"تم الحصول علي جميع الطلبيات المعلقه",200);


        }elseif (request('search') == 'waiting'){

            $data['ordersOfDriverWaiting'] = OrderResource::collection( $ordersOfDriverWaiting);

            return self::returnResponseDataApi($data,"تم الحصول علي جميع طلبيات انتظار الدفع",200);

        }else{

            $data['allOfOrdersHanging'] = OrderResource::collection($allOfOrdersHanging);
            $data['ordersOfDriverWaiting'] = OrderResource::collection( $ordersOfDriverWaiting);

            return self::returnResponseDataApi($data,"تم الحصول علي جميع الطلبات المعلقه وطلبات انتظار الدفع",200);
        }

    }

    public function allOrdersCompletedPayment(): JsonResponse
    {

        $ordersCompletedPayment = Order::query()
            ->whereHas('offer', fn(Builder $builder) =>
            $builder->where('driver_id','=',Auth::guard('user-api')->id())
                ->where('status','=',1)
            )
            ->where('status','=','complete')
            ->get();


        $data['ordersCompletedPayment'] = OrderResource::collection($ordersCompletedPayment);

        return self::returnResponseDataApi($data,"تم الحصول علي جميع الطلبات مكتمله الدفع للسائق",200);


    }

    public function orderDetail($id): JsonResponse
    {

        $order = Order::query()
            ->where('id','=',$id)
            ->first();

        if(!$order){
            return self::returnResponseDataApi(null,"الطلب غير موجود",404,404);

        }else{

            return self::returnResponseDataApi(new OrderDriverDetailResource($order),"تم الحصول علي تفاصيل الطلب بنجاح",200);
        }

    }

    public function changeOrderStatus($id): JsonResponse
    {

        $order = Order::query()
            ->where('id','=',$id)
            ->first();

        $setting  = Setting::query()
            ->first();

        if(!$order){
            return self::returnResponseDataApi(null,"الطلب غير موجود",404,404);

        }else{

            if($order->status == 'hanging'){

                $order->update(['status' => 'waiting']);

                Offer::create([

                    'user_id' => $order->user_id,
                    'driver_id' => Auth::guard('user-api')->id(),
                    'order_id' => $order->id,
                    'date' => Carbon::now(),
                    'price' => ($order->weight * $setting->shipment_price),
                    'status' => 0

                ]);
                return self::returnResponseDataApi(new OrderDriverDetailResource($order),"تم تاكيد الطلب بنجاح وفي انتظار الدفع من قبل العميل",200);

            }elseif ($order->status == 'complete'){

                return self::returnResponseDataApi(new OrderDriverDetailResource($order),"الطلب مكتمل الدفع من قبل العميل",419);

            }else{

                return self::returnResponseDataApi(new OrderDriverDetailResource($order),"تم تاكيد الطلب من قبل يرجي انتظار الدفع من قبل العميل",201,201);
            }

        }
    }
}
