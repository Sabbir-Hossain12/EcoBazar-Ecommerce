<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('frontend.pages.products.checkout');
    }


    public function shippingChargeUpdate(Request $request)
    {
        $shipping_charge = $request->input('shipping_charge');

        $subtotal = str_replace(',', '', Cart::subtotal(0));


        // Calculate the new total
        $total = $subtotal + $shipping_charge;


        return response()->json([
            'subtotal' => $subtotal,
            'shipping_charge' => $shipping_charge,
            'total' => $total,
        ]);
    }

    public function applyCoupon(Request $request)
    {
        $coupon_code = $request->coupon_code;

        if ($coupon_code == null || $coupon_code == "") {
            return response()->json([
                'status' => 'failed',
                'message' => 'Please Enter Coupon Code'
            ]);
        } else {
            $coupon = Coupon::where('code', $coupon_code)
                ->where('status', 1)
                ->where('expire_date', '>=', date('Y-m-d'))
                ->first();

            if ($coupon) {
                $subtotal = (float) str_replace(',', '', Cart::subtotal(0));

                $discount_amount = ($subtotal * ($coupon->discount / 100));
                $total_amount = $subtotal - $discount_amount;

                Session::put('coupon', [
                    'code' => $coupon->code,
                    'discount' => $coupon->discount,
                    'discount_amount' => $discount_amount,
                    'total_amount' => $total_amount
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Coupon Applied Successfully',
                    'total_amount' => $total_amount,
                    'discount_percentage' => $coupon->discount,
                    'discount_amount' => $discount_amount

                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Coupon Not Found'
                ]);
            }
        }
    }
}
