<?php

namespace App\Interfaces\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface OrderRepositoryInterface{

    public function getAllPlaces() : JsonResponse;
    public function ordersCompleted() : JsonResponse;
    public function ordersNotCompleted() : JsonResponse;
    public function addNewOrder(Request $request) : JsonResponse;

}
