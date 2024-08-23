@extends('frontend.layout.master')

@push('titles')
    EcoBazaar - Bootstrap eCommerce Template
@endpush

@push('add-css')

@endpush

@section('body-content')

    <!-- start Breadcrumb section -->
    <section class="breadcrumb-section" style="background-image: url({{ asset('public/frontend/assets/images/breadcrumb_image/Breadcrumbs.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-details">
                        <ul>
                            <li>
                                <a href="">
                                    <i class='bx bx-home'></i>  <i class='bx bx-chevron-right'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('cart.index')}}">
                                    <span>Shopping Cart</span>  
                                    <i class='bx bx-chevron-right'></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    Checkout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- start checkout section -->
    <section class="checkout-section">
        <div class="container">
            <div class="row">

                <div class="col-md-6 mb-5">
                    <div class="coupon-code">
                        <form action="">
                            <input type="text" class="coupon-form" placeholder="Enter Code">
                            <i class="bx bx-purchase-tag-alt"></i>
                            <button class="coupon-btn">Apply Coupon</button>
                        </form>
                    </div><!-- End. coupon-code -->
                </div><!-- End. col-md-6 -->
        <form action="{{route('order.store')}}" method="POST" id="codPaymentForm">
            @csrf
                <div class="col-lg-12">
                <div class="checkout-container">
                    <div class="checkout-billing">
                        <h3>Billing Information</h3>
                        

                            <div class="checkout-form">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">First name</label>
                                        <input type="text" name="first_name" class="normal-forms" id="" value="{{Auth::user()->name ?? ''}}" placeholder="Your first name" required>
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Last name</label>
                                        <input type="text" name="last_name" class="normal-forms" id="" placeholder="Your last name">
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Company name</label>
                                        <input type="text" name="company_name" class="normal-forms" id="" placeholder="Company name">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-labels">Street Address</label>
                                    <input type="text" name="address_1" class="normal-forms mb-2" id="" placeholder="Street Address" required>
                                    <input type="text" name="address_2" class="normal-forms" id="" placeholder="Address ( Optional )">
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Country</label>
                                        <select name="country" id="" class="normal-forms" required>
                                            <option value="" selected="" disabled="">Select Country</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">States/Districts</label>
                                        <select name="state_district" id="" class="normal-forms" required>
                                            <option value="" selected="" disabled="">Select States</option>
                                            <option value="Dhaka">Dhaka</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Zip Code</label>
                                        <input type="text" name="zip" class="normal-forms" id="" placeholder="Zip Code" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Email</label>
                                        <input type="text" name="email" class="normal-forms" id="" placeholder="Email Address">
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Phone</label>
                                        <input type="text" name="phone" class="normal-forms" id="" placeholder="Phone Number" required>
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Shipping Charge</label>
                                        <select name="shipping_charge" id="" class="normal-forms" required>
                                            <option value="" selected="" disabled="">Select Shipping Charge</option>
                                            <option value="60">InSide Dhaka</option>
                                            <option value="120">OutSide Dhaka</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- End. checkout-form -->

                            <div class="additional-info">
                                <h3>Additional Info</h3>

                                <div class="mb-3">
                                    <label for="" class="form-labels">Order Notes (Optional)</label>
                                    <textarea name="order_note" id="" class="normal-textarea" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                </div>
                            </div><!-- End. additional-info -->
                    </div><!-- End. checkout-billing -->

                        <div class="main-order-summary">
                            <div class="order-summary">
                                <h2>Order Summery</h2>

                                <ul class="all-products-container">
                                    @foreach(Cart::content() as $item) 
                                    <li>
                                        <div class="all-products-show">
                                            <div class="all-products-list">
                                                <img src="{{ asset($item->options->image) }}" alt="">
                                                <div class="all-products-details">
                                                    <p>{{ $item->name }}</p>
                                                    <span>{{ $item->qty }} X ৳ {{ $item->price }} </span>
                                                </div>
                                            </div><!-- End. all-products-list -->
            
                                            <span>৳{{ $item->price }}</span>
                                        </div><!-- End. all-products-show -->
                                    </li>
                                    
                                    @endforeach
                                </ul><!-- End. all-products-container -->

                                <div class="order-summary-details">
                                    <p>Subtotal:</p>
                                    <span>৳{{Cart::subtotal(0) }}</span>
                                </div><!-- End. order-summary-details -->

                                <div class="order-summary-details">
                                    <p>Coupon Code:</p>
                                    <span>$0.00</span>
                                </div><!-- End. order-summary-details -->
                        
                                <div class="order-summary-details">
                                    <p>Shipping:</p>
                                    <span>$0.00</span>
                                </div><!-- End. order-summary-details -->
                                
                                <div class="order-summary-details">
                                    <p>Tax:</p>
                                    <span>$0.00</span>
                                </div><!-- End. order-summary-details -->

                                <div class="order-summary-details">
                                    <p>Total:</p>
                                    <span>৳{{Cart::subtotal(0) }}</span>
                                </div><!-- End. order-summary-details -->

                                <div class="payment-method">
                                    <h2>Payment Method</h2>

                                    <div class="payment-form">
                                        <input type="radio" name="payment_method" id="cod" checked="" value="COD">
                                        <label for="cod" class="payment-label">Cash on Delivery</label>
                                    </div><!-- End. payment-form -->

                                    <div class="payment-form">
                                        <input type="radio" name="payment_method" id="ssl_commercez" value="SSLCOMMERZ">
                                        <label for="ssl_commercez" class="payment-label">SSL Commercez</label>
                                    </div><!-- End. payment-form -->

                                    <div class="payment-form">
                                        <input type="radio" name="payment_method" id="paypal" value="Paypal">
                                        <label for="paypal" class="payment-label">Paypal</label>
                                    </div><!-- End. payment-form -->

                                    <div class="payment-form">
                                        <input type="radio" name="payment_method" id="stripe" value="Stripe">
                                        <label for="stripe" class="payment-label">Stripe</label>
                                    </div><!-- End. payment-form -->
                                </div><!-- End. payment-method -->
                                
                                
                                <input type="text" name="total" value="{{Cart::subtotal(0,0,0)}}" class="normal-forms" id="" hidden>
                                <input type="text" name="subtotal" value="{{str_replace(',','',Cart::subtotal(0))}}" class="normal-forms" id="" hidden>
                                

                                <button id="cod-btn" form="codPaymentForm" type="submit" class="order-btn">Cash On Delivery</button>
                                <button id="ssl-btn" class="btn order-btn d-none" >Pay with SSL Commerz</button>
                                <button id="paypal-btn" class="btn order-btn d-none" >Pay with PayPal</button>
                                <button id="stripe-btn" class="btn order-btn d-none" >Pay with Stripe</button>

                            </div>
                        </div>
                </div>
                </div>
</form>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. checkout-section -->

@endsection


@push('add-scripts')
    
    <script>
    $(document).ready(function(){
        $("#cod").click(function(){
            $('#cod-btn').removeClass('d-none');
            $("#ssl-btn").addClass("d-none");
            $("#paypal-btn").addClass("d-none");
            $("#stripe-btn").addClass("d-none");
        });
        $("#ssl_commercez").click(function(){
            $('#cod-btn').addClass('d-none'); 
            $("#ssl-btn").removeClass("d-none");
            $("#paypal-btn").addClass("d-none");
            $("#stripe-btn").addClass("d-none");
        });
        $("#paypal").click(function(){
            $('#cod-btn').addClass('d-none');
            $("#ssl-btn").addClass("d-none");
            $("#paypal-btn").removeClass("d-none");
            $("#stripe-btn").addClass("d-none");
        });
        $("#stripe").click(function() {
            $('#cod-btn').addClass('d-none');
            $("#ssl-btn").addClass("d-none");
            $("#paypal-btn").addClass("d-none");
            $("#stripe-btn").removeClass("d-none");
        });
    });

    </script>

@endpush