<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function orderAllData(Request $request)
    {
        $orders = Order::with(['orderProducts', 'customer'])->get();

        if (request()->ajax()) {
            return DataTables::of($orders)
                ->addColumn('customerInfo', function ($order) {
                    return $order->customer->first_name.' '.$order->customer->first_name.'<br>'.
                        $order->customer->email.'<br>'.$order->customer->phone;
                })
                ->addColumn('date', function ($order) {
                    return $order->created_at->format('d M, Y').'<br>'.$order->created_at->format('h:i A');
                })
                ->addColumn('productInfo', function ($order) {
                    $productInfo = '';
                    foreach ($order->orderProducts as $orderProduct) {
                        if ($orderProduct->color && $orderProduct->size && $orderProduct->weight)
                        {
                            $productInfo .= $orderProduct->product_name.'<br>'.
                                $orderProduct->quantity.' x '.$orderProduct->color.
                                ' x '.$orderProduct->size.' x '.$orderProduct->weight.'<br>';
                        }
                       else if ($orderProduct->color && $orderProduct->size )
                        {
                            $productInfo .= $orderProduct->product_name.'<br>'.
                                $orderProduct->quantity.' x '.$orderProduct->color.
                                 ' x '.$orderProduct->size.'<br>';
                        }
                       else if ($orderProduct->color )
                        {
                                $productInfo .= $orderProduct->product_name.'<br>'.
                                $orderProduct->quantity.' x '.$orderProduct->color.
                                '<br>';
                        }
                      else  if ($orderProduct->size )
                        {
                            $productInfo .= $orderProduct->product_name.'<br>'.
                                $orderProduct->quantity.' x '.$orderProduct->size.
                                '<br>';
                        }
                    else   if ($orderProduct->weight )
                        {
                            $productInfo .= $orderProduct->product_name.'<br>'.
                                $orderProduct->quantity.' x '.$orderProduct->weight.
                                '<br>';
                        }
                        
                        
                    }
                    return $productInfo;
                })
                ->addColumn('action', function ($order) {
                    return '<div class="d-flex flex-column gap-2"><a class="viewButton btn btn-sm btn-primary" href="javascript:void(0)" data-id="'.$order->id.'" data-bs-toggle="modal" data-bs-target=""><i class="fas fa-print"></i></a>
                            <a class="editButton btn btn-sm btn-primary" href="javascript:void(0)" data-id="'.$order->id.'" data-bs-toggle="modal" data-bs-target="#editAdminModal"><i class="fas fa-edit"></i></a>
                                                             <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$order->id.'" id="deleteAdminBtn""> <i class="fas fa-trash"></i></a>
                                                           </div>';
                })
                ->addIndexColumn()
                ->rawColumns(['customerInfo', 'action'])
                ->escapeColumns([])
                ->make(true);
        }
        return view('backend.pages.order.index', compact('orders'));
    }

    public function orderPendingData()
    {
        $pendingOrders = Order::where('order_status', 'Pending')->get();

        if (request()->ajax()) {
            return DataTables::of($pendingOrders)->make(true);
        }

        return view('backend.pages.order.pending-order', compact('pendingOrders'));
    }

    public function orderProcessingData()
    {
        $processing = Order::where('order_status', 'processing')->get();

        if (request()->ajax()) {
            return DataTables::of($processing)->make(true);
        }

        return view('backend.pages.order.processing-order', compact('processing'));
    }

    public function orderDroppedData()
    {
        $droppedOrder = Order::where('order_status', 'dropped_off')->get();

        if (request()->ajax()) {
            return DataTables::of($droppedOrder)->make(true);
        }
        return view('backend.pages.order.dropped_off', compact('droppedOrder'));
    }

    public function orderShippedData()
    {
        $shippedOrder = Order::where('order_status', 'shipped')->get();

        if (request()->ajax()) {
            return DataTables::of($shippedOrder)->make(true);
        }

        return view('backend.pages.order.shipped-order', compact('shippedOrder'));
    }

    public function orderOutForDeliveryData()
    {
        $outForDeliveryOrders = Order::where('order_status', 'out_for_delivery')->get();

        if (request()->ajax()) {
            return DataTables::of($outForDeliveryOrders)->make(true);
        }

        return view('backend.pages.order.out-for-delivery-order', compact('outForDeliveryOrders'));
    }

    public function orderDeliveryData()
    {
        $deliveredOrder = Order::where('order_status', 'delivered')->get();

        if (request()->ajax()) {
            return DataTables::of($deliveredOrder)
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.pages.order.delivered-order', compact('deliveredOrder'));
    }


    public function orderCancelledData()
    {
        $cancelledOrders = Order::where('order_status', 'cancelled')->get();

        if (request()->ajax()) {
            return DataTables::of($cancelledOrders)->make(true);
        }

        return view('backend.pages.order.cancelled-order', compact('cancelledOrders'));
    }


}
