<?php

namespace App\Interfaces\Api;

use App\Http\Resources\OrderDriverDetailResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface OrderRepositoryInterface{

    public function getAllPlaces() : JsonResponse;
    public function ordersCompleted() : JsonResponse;
    public function ordersNotCompleted() : JsonResponse;
    public function addNewOrder(Request $request) : JsonResponse;
    public function orderDetail($id): JsonResponse;
    public function addPaymentForOrder(Request $request,$id): JsonResponse;


}
