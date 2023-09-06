<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\OrderInterface;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected OrderInterface $orderInterface;

    public function __construct(OrderInterface $orderInterface)
    {
        $this->orderInterface = $orderInterface;
    }

    public function complete(Request $request)
    {
        return $this->orderInterface->complete($request);
    }

    public function waiting(Request $request)
    {
        return $this->orderInterface->waiting($request);
    }

    public function new(Request $request)
    {
        return $this->orderInterface->new($request);
    }

    public function show($order)
    {
        return $this->orderInterface->show($order);
    }

    public function invoice($order)
    {
        return $this->orderInterface->invoice($order);
    }
}
