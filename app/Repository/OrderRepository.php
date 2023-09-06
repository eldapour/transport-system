<?php

namespace App\Repository;

use App\Interfaces\OrderInterface;
use App\Models\Offer;
use App\Models\Order;
use Yajra\DataTables\DataTables;

class OrderRepository implements OrderInterface
{
    public function complete($request)
    {
        if ($request->ajax()) {
            $order = Order::query()
                ->where('status','=','complete')
                ->latest()->get();
            return DataTables::of($order)
                ->addColumn('action', function ($order) {
                    return '
                            <button type="button" data-id="' . $order->id . '" class="btn btn-pill btn-success editBtn"><i class="fa fa-eye"></i> عرض</button>
                       ';
                })
                ->editColumn('image', function ($order) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($order->image) . '">
                    ';
                })
                ->editColumn('user_id', function ($order) {
                    return $order->user->name .' ( '.$order->user->id.' ) ';
                })
                ->addColumn('driver_id', function ($order) {
                    $offer = Offer::query()->where('order_id', $order->id)
                        ->where('status','=',1)
                        ->first('driver_id');
                    $offer->driver->name;
                    return $offer->driver->name .' ( '.$offer->driver->id.' ) ';
                })
                ->editColumn('from_warehouse', function ($order) {
                    return $order->from_warehouse_place->name_ar;
                })
                ->editColumn('to_warehouse', function ($order) {
                    return $order->to_warehouse_place->name_ar;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.order.complete');
        }
    }

    public function waiting($request)
    {
        if ($request->ajax()) {
            $order = Order::query()
                ->where('status','=','waiting')
                ->latest()->get();
            return DataTables::of($order)
                ->addColumn('action', function ($order) {
                    return '
                            <button type="button" data-id="' . $order->id . '" class="btn btn-pill btn-success editBtn"><i class="fa fa-eye"></i> عرض</button>
                       ';
                })
                ->editColumn('image', function ($order) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($order->image) . '">
                    ';
                })
                ->editColumn('user_id', function ($order) {
                    return $order->user->name .' ( '.$order->user->id.' ) ';
                })
                ->editColumn('from_warehouse', function ($order) {
                    return $order->from_warehouse_place->name_ar;
                })
                ->editColumn('to_warehouse', function ($order) {
                    return $order->to_warehouse_place->name_ar;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.order.waiting');
        }
    }

    public function new($request)
    {
        if ($request->ajax()) {
            $order = Order::query()
                ->where('status','=','hanging')
                ->latest()->get();
            return DataTables::of($order)
                ->addColumn('action', function ($order) {
                    return '
                            <button type="button" data-id="' . $order->id . '" class="btn btn-pill btn-success editBtn"><i class="fa fa-eye"></i> عرض</button>
                       ';
                })
                ->editColumn('image', function ($order) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . asset($order->image) . '">
                    ';
                })
                ->editColumn('user_id', function ($order) {
                    return $order->user->name .' ( '.$order->user->id.' ) ';
                })
                ->editColumn('from_warehouse', function ($order) {
                    return $order->from_warehouse_place->name_ar;
                })
                ->editColumn('to_warehouse', function ($order) {
                    return $order->to_warehouse_place->name_ar;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.order.new');
        }
    }

    public function show($order)
    {
        $offer = Offer::query()
            ->where('order_id',$order)
            ->with('order')
            ->first();
        if (!$offer){
            $offer = Order::query()
            ->find($order);
        }
        return view('admin.order.parts.show',compact('offer'));
    }

    public function invoice($order)
    {
        $offer = Offer::query()
            ->where('order_id',$order)
            ->with('order')
            ->first();
        if (!$offer){
            $offer = Order::query()
                ->find($order);
        }
        return view('admin.order.parts.invoice',compact('offer'));
    }
}
