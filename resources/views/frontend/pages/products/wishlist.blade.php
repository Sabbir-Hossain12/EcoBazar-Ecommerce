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
                                    Wishlist
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- start Wishlist section -->
    <section class="wishlist-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Wishlist</h2>

                    <table class="table">
                        <thead class="all_thead">
                          <tr >
                            <th scope="col"><span class="">Product</span></th>
                            <th scope="col"><span class="">Price</span></th>
                            <th scope="col"><span class="">Stock Status</span></th>
                            <th scope="col"><span class=""></span></th>
                          </tr>
                        </thead>
                        
                        <tbody>
                          <tr class="all_tr">
                            <td class="all_td">
                                <div class="wishlist-product-list">
                                    <img src="{{ asset('public/frontend/assets/images/product_images/capsicum.png') }}" alt="">
                                    <h3>Green Capsicum</h3>
                                </div>
                            </td>

                            <td class="all_td" style="vertical-align: middle">
                                <div class="wishlist-product-price">
                                   <p>$14.99 <del>$<span>20.99</span></del></p>
                                </div>
                            </td>

                            <td class="all_td" style="vertical-align: middle">
                                <div class="wishlist-stock">
                                    <span class="stock-in">In Stock</span>
                                </div>
                            </td>

                            <td class="all_td" style="vertical-align: middle; text-align: end;">
                                 <div class="wishlist-action">
                                    <button class="wishlist_btn">Add To Cart</button>
                                    <i class='bx bx-x'></i>
                                 </div>
                            </td>
                          </tr>

                          <tr class="all_tr">
                            <td class="all_td">
                                <div class="wishlist-product-list">
                                    <img src="{{ asset('public/frontend/assets/images/product_images/bakchoy.png') }}" alt="">
                                    <h3>Chinese Cabbage</h3>
                                </div>
                            </td>

                            <td class="all_td" style="vertical-align: middle">
                                <div class="wishlist-product-price">
                                   <p>$45.00</p>
                                </div>
                            </td>

                            <td class="all_td" style="vertical-align: middle">
                                <div class="wishlist-stock">
                                    <span class="stock-out">Out Of Stock</span>
                                </div>
                            </td>
                            
                            <td class="all_td" style="vertical-align: middle; text-align: end;">
                                 <div class="wishlist-action">
                                    <button class="wishlist_btn" disabled>Add To Cart</button>
                                    <i class='bx bx-x'></i>
                                 </div>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. wishlist-section -->

@endsection


@push('add-scripts')

@endpush