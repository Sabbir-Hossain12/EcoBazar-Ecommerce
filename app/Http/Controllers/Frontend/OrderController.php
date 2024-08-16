<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
//        dd($request->all());
        if (Cart::content()->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty. Please add items to your cart before placing an order.');
        }
        DB::beginTransaction();
        try {
            $customer = new Customer();
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->company_name = $request->company_name;
            $customer->address_1 = $request->address_1;
            $customer->address_2 = $request->address_2;
            $customer->state_district = $request->state_district;
            $customer->zip = $request->zip;
            $customer->country = $request->country;
            $customer->phone = $request->phone;
            $customer->email = $request->email;

            $customer->save();


            $order = new Order();
            $order->customer_id = $customer->id;
            $order->user_id = auth()->user()->id ?? null;
            $order->invoiceID = 'BM'.rand('100000', '999999');
            $order->payment_method = $request->payment_method;
            $order->shipping_charge = $request->shipping_charge;
            $order->order_note = $request->order_note;
            $order->subtotal = $request->subtotal;
            $order->total = $request->total;
            $order->order_date = today();

            $order->save();


            foreach (Cart::content() as $cartItem) {
                $orderProduct = new OrderProduct();
                $orderProduct->order_id = $order->id;
                $orderProduct->product_id = $cartItem->id;
                $orderProduct->product_name = $cartItem->name;


                $orderProduct->product_price = $cartItem->price;
                $orderProduct->quantity = $cartItem->qty;
                $orderProduct->total = $cartItem->qty * $cartItem->price;

                $orderProduct->color = $cartItem->options->color;
                $orderProduct->size = $cartItem->options->size;
                $orderProduct->weight = $cartItem->options->weight;
                $orderProduct->save();
            }

            Cart::destroy();
            DB::commit();

            return view('frontend.pages.orders.order-success');
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
