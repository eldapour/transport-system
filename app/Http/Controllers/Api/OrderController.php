<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderDriverDetailResource;
use App\Interfaces\Api\OrderRepositoryInterface;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller{

    public OrderRepositoryInterface $orderRepositoryInterface;

    public function __construct(OrderRepositoryInterface $orderRepositoryInterface)
    {
        $this->orderRepositoryInterface = $orderRepositoryInterface;
    }


    public function getAllPlaces() : JsonResponse{

        return $this->orderRepositoryInterface->getAllPlaces();
    }


    public function ordersCompleted() : JsonResponse{

        return $this->orderRepositoryInterface->ordersCompleted();

    }


    public function ordersNotCompleted() : JsonResponse{

        return $this->orderRepositoryInterface->ordersNotCompleted();

    }

    public function addNewOrder(Request $request) : JsonResponse{

        return $this->orderRepositoryInterface->addNewOrder($request);

    }


    public function orderDetail($id): JsonResponse
    {

       return $this->orderRepositoryInterface->orderDetail($id);

    }

    public function addPaymentForOrder(Request $request,$id): JsonResponse
    {

       return $this->orderRepositoryInterface->addPaymentForOrder($request,$id);

    }
}
