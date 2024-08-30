<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('frontend.pages.products.checkout');
    }


    public function shippingChargeUpdate(Request $request)
    {
        $shipping_charge = $request->input('shipping_charge');

        $subtotal = str_replace(',','',Cart::subtotal(0)); 
        
        

        // Calculate the new total
        $total = $subtotal + $shipping_charge;


        return response()->json([
            'subtotal' => $subtotal,
            'shipping_charge' => $shipping_charge,
            'total' => $total,
        ]);
        
        
    }
}
