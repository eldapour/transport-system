<?php

namespace App\Interfaces\Api\Driver;

use Illuminate\Http\JsonResponse;

interface OrderRepositoryInterface{


    public function allOrdersOfDriver(): JsonResponse;
    public function allOrdersCompletedPayment(): JsonResponse;
    public function orderDetail($id): JsonResponse;
    public function changeOrderStatus($id): JsonResponse;


}



