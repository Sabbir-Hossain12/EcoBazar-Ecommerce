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

    public function orderStatusData(String $status)
    {
        $Orders = Order::where('order_status', $status)->get();

        if (request()->ajax()) {
            return DataTables::of($Orders)
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

        return view('backend.pages.order.order-status-data', compact('Orders', 'status'));
    }

    public function orderStatusChange(Request $request)
    {
        $order_status= $request->order_status;
        $order_id= $request->order_id;
        

        $order = Order::find($order_id);
        $order->order_status = $order_status;
        $order->update();
        
        return response()->json(['message' => 'Order Status Changed to '.$order_status], 200);
        
    }



}
