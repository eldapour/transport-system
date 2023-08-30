<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use App\Interfaces\Api\Driver\OrderRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller{


    public OrderRepositoryInterface $orderRepositoryInterface;

    public function __construct(OrderRepositoryInterface $orderRepositoryInterface)
    {

        $this->orderRepositoryInterface = $orderRepositoryInterface;
    }


    public function allOrdersOfDriver(): JsonResponse
    {
        return $this->orderRepositoryInterface->allOrdersOfDriver();

    }
    public function allOrdersCompletedPayment(): JsonResponse
    {

        return $this->orderRepositoryInterface->allOrdersCompletedPayment();

    }
    public function orderDetail($id): JsonResponse
    {

        return $this->orderRepositoryInterface->orderDetail($id);

    }
    public function changeOrderStatus($id): JsonResponse
    {

        return $this->orderRepositoryInterface->changeOrderStatus($id);

    }

}
