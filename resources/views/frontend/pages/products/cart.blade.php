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
                                <a href="javascript:;">
                                    Shopping Cart
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- start Cart section -->
    <section class="cart-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Shopping Cart</h2>

                    <div class="cart-container">
                        <div class="cart-table">
                            <table class="table">
                                <thead class="all_thead">
                                  <tr>
                                    <th scope="col"><span class="">Product</span></th>
                                    <th scope="col"><span class="">Price</span></th>
                                    <th scope="col"><span class="">Quantity</span></th>
                                    <th scope="col"><span class="">Sub-Total</span></th>
                                    <th scope="col"><span class=""></span></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                  <tr class="all_tr">
                                    <td class="all_td">
                                        <div class="cart-product-list">
                                            <img src="{{ asset('public/frontend/assets/images/product_images/capsicum.png') }}" alt="">
                                            <h3>Green Capsicum</h3>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle">
                                        <div class="cart-product-price">
                                           <p>$14.99</p>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle">
                                        <div class="main-cart-quantity">
                                            <div class="cart-quantity">
                                                <i class='bx bx-minus'></i>
                                                <input type="number" class="quantity" readonly value="0" min="1" max="10">
                                                <i class='bx bx-plus'></i>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle">
                                        <div class="cart-subTotal">
                                            <p>$14.99</p>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle; text-align: end;">
                                         <div class="cart-action">
                                            <i class='bx bx-x'></i>
                                         </div>
                                    </td>
                                  </tr>

                                  <tr class="all_tr">
                                    <td class="all_td">
                                        <div class="cart-product-list">
                                            <img src="{{ asset('public/frontend/assets/images/product_images/bakchoy.png') }}" alt="">
                                            <h3>Green Capsicum</h3>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle">
                                        <div class="cart-product-price">
                                           <p>$14.99</p>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle">
                                        <div class="main-cart-quantity">
                                            <div class="cart-quantity">
                                                <i class='bx bx-minus'></i>
                                                <input type="number" class="quantity" readonly value="0" min="1" max="10">
                                                <i class='bx bx-plus'></i>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle">
                                        <div class="cart-subTotal">
                                            <p>$14.99</p>
                                        </div>
                                    </td>

                                    <td class="all_td" style="vertical-align: middle; text-align: end;">
                                         <div class="cart-action">
                                            <i class='bx bx-x'></i>
                                         </div>
                                    </td>
                                  </tr>

                                  <tr class="all_tr">
                                     <td class="all_td" colspan="5">
                                         <a href="">
                                            <button class="btns secondary_btn">Return To Shop</button>
                                         </a>
                                     </td>
                                  </tr>
                                </tbody>
                            </table>

                            <div class="coupon-details">
                                <h3>Coupon Code</h3>

                                <div class="coupon-code">
                                    <form action="">
                                        <input type="text" class="coupon-form" placeholder="Enter Code">
                                        <i class='bx bx-purchase-tag-alt'></i>
                                        <button class="coupon-btn">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <aside class="cart-calculation">
                            <h2>Cart Total</h2>

                            <div class="cart-calc-details">
                                <p>Subtotal:</p>
                                <span>$84.00</span>
                            </div>

                            <div class="cart-calc-details">
                                <p>Shipping:</p>
                                <span>Free</span>
                            </div>

                            <div class="cart-calc-details">
                                <p>Total:</p>
                                <span>$84.00</span>
                            </div>

                            <a href="" class="cart-to-checkout">Proceed to checkout</a>
                        </aside>
                    </div>
                </div>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. cart-section -->

@endsection


@push('add-scripts')

@endpush