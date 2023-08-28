<?php

namespace App\Repository\Api;

use App\Http\Resources\OrderResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\WarehouseResource;
use App\Interfaces\Api\OrderRepositoryInterface;
use App\Models\Order;
use App\Models\User;
use App\Models\Warehouse;
use App\Repository\ResponseApi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OrderRepository extends ResponseApi implements OrderRepositoryInterface {

    public function getAllPlaces(): JsonResponse
    {
        $warehouses = WarehouseResource::collection(Warehouse::get());

        return self::returnResponseDataApi($warehouses,"تم الحصول علي جميع اماكن المخازن بنجاح",200);

    }

    public function ordersCompleted(): JsonResponse
    {
        $ordersCompleted = Order::query()
            ->where('user_id','=', Auth::guard('user-api')->id())
            ->where('status','=','complete')
        ->get();


        return self::returnResponseDataApi(OrderResource::collection($ordersCompleted),"تم الحصول علي الطلبات الكتمله بنجاح",200);

    }

    public function ordersNotCompleted(): JsonResponse
    {
        $ordersCompleted = Order::query()
            ->where('user_id','=', Auth::guard('user-api')->id())
            ->where('status','=','hanging')
            ->orWhere('status','=','waiting')
            ->get();


        return self::returnResponseDataApi(OrderResource::collection($ordersCompleted),"تم الحصول علي الطلبات الغير الكتمله بنجاح",200);

    }

    public function addNewOrder(Request $request): JsonResponse
    {

        try {

            $rules = [
                'image' => 'required|mimes:jpg,png,jpeg',
                'from_warehouse' => 'required|exists:warehouses,id',
                'to_warehouse' => 'required|exists:warehouses,id',
                'weight' => 'required|numeric',
                'qty' => 'required|numeric',
                'value' => 'required|numeric',
                'type' => 'required',
                'description' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules, [
                'image.mimes' => 406,
            ]);

            if ($validator->fails()) {
                $errors = collect($validator->errors())->flatten(1)[0];

                if (is_numeric($errors)) {
                    $errors_arr = [
                        406 => 'Failed,The image must be an jpg,png,jpeg',
                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return self::returnResponseDataApi(null, $errors_arr[$errors] ?? 500, $code);
                }
                return self::returnResponseDataApi(null,$validator->errors()->first(),422);
            }

            if($request->from_warehouse == $request->to_warehouse){

                return self::returnResponseDataApi(null,"يجب عدم اضافه موقع الشحنه مثل واجهه الشحنه",409);
            }

            if ($image = $request->file('image')) {

                $destinationPath = 'uploads/orders/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['image'] = $profileImage;
            }

            $storeNewOrder = Order::create([
                'image' => 'uploads/orders/'.$profileImage,
                'from_warehouse' => $request->from_warehouse,
                'to_warehouse' => $request->to_warehouse,
                'weight' => $request->weight,
                'qty' => $request->qty,
                'value' => $request->value,
                'type' => $request->type,
                'status' => 'hanging',
                'user_id' => Auth::guard('user-api')->id(),
                'description' => $request->description
            ]);

            if (isset($storeNewOrder)) {
                return self::returnResponseDataApi(new OrderResource($storeNewOrder), "تم تسجيل بيانات الطلب بنجاح", 200);

            }else{

                return self::returnResponseDataApi(null,"يوجد خطاء ما اثناء دخول البيانات",500,500);
            }
        } catch (\Exception $exception) {

            return self::returnResponseDataApi($exception->getMessage(),500,false,500);
        }

    }
}
