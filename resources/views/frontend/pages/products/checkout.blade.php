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
                                <a href="">
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

                <div class="col-lg-12">
                <div class="checkout-container">
                    <div class="checkout-billing">
                        <h3>Billing Information</h3>

                            <div class="checkout-form">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">First name</label>
                                        <input type="text" name="" class="normal-forms" id="" placeholder="Your first name">
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Last name</label>
                                        <input type="text" name="" class="normal-forms" id="" placeholder="Your last name">
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Company name</label>
                                        <input type="text" name="" class="normal-forms" id="" placeholder="Company name">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-labels">Street Address</label>
                                    <input type="text" name="" class="normal-forms mb-2" id="" placeholder="Street Address">
                                    <input type="text" name="" class="normal-forms" id="" placeholder="Address ( Optional )">
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Country \ Region</label>
                                        <select name="" id="" class="normal-forms">
                                            <option value="" selected="" disabled="">Select Country</option>
                                            <option value="">Bangladesh</option>
                                            <option value="">Pakistan</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">States</label>
                                        <select name="" id="" class="normal-forms">
                                            <option value="" selected="" disabled="">Select States</option>
                                            <option value="">Dhaka</option>
                                            <option value="">Islamabad</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Zip Code</label>
                                        <input type="text" name="" class="normal-forms" id="" placeholder="Zip Code">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Email</label>
                                        <input type="text" name="" class="normal-forms" id="" placeholder="Email Address">
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Phone</label>
                                        <input type="text" name="" class="normal-forms" id="" placeholder="Phone Number">
                                    </div>

                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="" class="form-labels">Shipping Charge</label>
                                        <select name="" id="" class="normal-forms">
                                            <option value="" selected="" disabled="">Select Shipping Charge</option>
                                            <option value="">InSide Dhaka</option>
                                            <option value="">OutSide Dhaka</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- End. checkout-form -->

                            <div class="additional-info">
                                <h3>Additional Info</h3>

                                <div class="mb-3">
                                    <label for="" class="form-labels">Order Notes (Optional)</label>
                                    <textarea name="" id="" class="normal-textarea" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                </div>
                            </div><!-- End. additional-info -->
                    </div><!-- End. checkout-billing -->

                        <div class="main-order-summary">
                            <div class="order-summary">
                                <h2>Order Summery</h2>

                                <ul class="all-products-container">
                                    <li>
                                        <div class="all-products-show">
                                            <div class="all-products-list">
                                                <img src="{{ asset('public/frontend/assets/images/product_images/capsicum.png') }}" alt="">
                                                <div class="all-products-details">
                                                    <p>Green Capsicum</p>
                                                    <span>1Pcs X $70.00</span>
                                                </div>
                                            </div><!-- End. all-products-list -->
            
                                            <span>$70.00</span>
                                        </div><!-- End. all-products-show -->
                                    </li>
                                    <li>
                                        <div class="all-products-show">
                                            <div class="all-products-list">
                                                <img src="{{ asset('public/frontend/assets/images/product_images/cauliflower.png') }}" alt="">
                                                <div class="all-products-details">
                                                    <p>Cauliflower</p>
                                                    <span>1Pcs X $85.00</span>
                                                </div>
                                            </div><!-- End. all-products-list -->
            
                                            <span>$85.00</span>
                                        </div><!-- End. all-products-show -->
                                    </li>
                                </ul><!-- End. all-products-container -->

                                <div class="order-summary-details">
                                    <p>Subtotal:</p>
                                    <span>$155.00</span>
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
                                    <span>$155.00</span>
                                </div><!-- End. order-summary-details -->

                                <div class="payment-method">
                                    <h2>Payment Method</h2>

                                    <div class="payment-form">
                                        <input type="radio" name="payment-method" id="cod" checked="">
                                        <label for="cod" class="payment-label">Cash on Delivery</label>
                                    </div><!-- End. payment-form -->

                                    <div class="payment-form">
                                        <input type="radio" name="payment-method" id="ssl_commercez">
                                        <label for="ssl_commercez" class="payment-label">SSL Commercez</label>
                                    </div><!-- End. payment-form -->

                                    <div class="payment-form">
                                        <input type="radio" name="payment-method" id="paypal">
                                        <label for="paypal" class="payment-label">Paypal</label>
                                    </div><!-- End. payment-form -->

                                    <div class="payment-form">
                                        <input type="radio" name="payment-method" id="stripe">
                                        <label for="stripe" class="payment-label">Stripe</label>
                                    </div><!-- End. payment-form -->
                                </div><!-- End. payment-method -->

                                <button type="button" class="order-btn">Place Order</button>

                            </div><!-- End. order-summary -->
                        </div><!-- End. main-order-summary -->
                </div><!-- End. checkout-container -->
                </div><!-- End. col-lg-12 -->
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. checkout-section -->

@endsection


@push('add-scripts')

@endpush