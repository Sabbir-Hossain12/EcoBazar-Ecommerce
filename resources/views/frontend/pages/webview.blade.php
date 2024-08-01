@extends('frontend.layout.master')

@push('titles')
    EcoBazaar - Bootstrap eCommerce Template
@endpush

@push('add-css')

<style>

    /* Only for ( Banner section ) */
    .banner-page{
        background-color: #EDF2EE;
    }
    .banner-details span{
        color: var(--theme-green);
    }
    .banner-details h1{
        color: var(--theme-black);
    }
    .banner-details h5{
        color: var(--theme-black);
    }
    .banner-details h5 span{
        color: var(--theme-orange);
    }
    .banner-details p{
        color: var(--theme-paragraph-1);
    }
    .btn-color-change{
        background-color: var(--theme-green);
        color: var(--theme-white);
        border: 1px solid var(--theme-green);
    }
    .btn-color-change:hover{
        background-color: var(--theme-white);
        color: var(--theme-green);
        border: 1px solid var(--theme-green);
    }
    #bannerSlider button.owl-prev{
        background: var(--theme-white);
        color: var(--theme-green);
        border: 2px solid var(--theme-green);
    }
    #bannerSlider button.owl-next{
        background: var(--theme-white);
        color: var(--theme-green);
        border: 2px solid var(--theme-green);
    }
    #bannerSlider button.owl-next:hover,
    #bannerSlider button.owl-prev:hover{
        background: var(--theme-green);
        color: var(--theme-white);
        border: 2px solid var(--theme-green);
    }
</style>

@endpush

@section('body-content')

    <!-- Start Banner Section -->
    <section class="banner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-3">
                    <div class="owl-carousel owl-theme" id="bannerSlider">
                        <div class="banner-page">
                            <div class="banner-details order-second">
                                <span>Welcome to shopery</span>
                                <h1>Fresh & Healthy Organic Food</h1>
                                <h5>Sale up to <span>30% OFF</span></h5>
                                <p>Free shipping on all your order. we deliver, you enjoy</p>
                                <button class="banner-btn">Shop Now <i class="fa-solid fa-arrow-right ms-2"></i></button>
                            </div><!-- End. banner-details -->

                            <div class="banner-images order-first">
                                <img src="{{ asset('public/frontend/assets/images/banner_images/banner-1.png') }}" alt="">
                            </div>
                        </div><!-- End. banner-page -->

                        <div class="banner-page">
                            <div class="banner-details order-first">
                                <span>Welcome to shopery</span>
                                <h1>Fresh & Healthy Organic Food</h1>
                                <h5>Sale up to <span>30% OFF</span></h5>
                                <p>Free shipping on all your order. we deliver, you enjoy</p>
                                <button class="banner-btn">Shop Now <i class="fa-solid fa-arrow-right ms-2"></i></button>
                            </div><!-- End. banner-details -->

                            <div class="banner-images order-second">
                                <img src="{{ asset('public/frontend/assets/images/banner_images/banner-2.png') }}" alt="">
                            </div>
                        </div><!-- End. banner-page -->
                    </div><!-- End. bannerSlider -->
                </div><!-- End. col-lg-9 -->
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. banner-section -->


    <!-- Start ECommerce Featured Section -->
    <section class="eCommerce-featured">
        <div class="container">
            <div class="row featured-container">
                <div class="col-6 col-lg-3">
                <div class="featured-details">
                    <img src="{{ asset('public/frontend/assets/images/all-icons/delivery-truck.png') }}" alt="">
                    <div class="featured-title">
                        <h3>Free Shipping</h3>
                        <p>Free shipping on all your order</p>
                    </div><!-- End. featured-title -->
                </div><!-- End. featured-details -->
                </div><!-- End. col-6 col-lg-3 -->

                <div class="col-6 col-lg-3">
                    <div class="featured-details">
                        <img src="{{ asset('public/frontend/assets/images/all-icons/support.png') }}" alt="">
                        <div class="featured-title">
                            <h3>Free Shipping</h3>
                            <p>Free shipping on all your order</p>
                        </div><!-- End. featured-title -->
                    </div><!-- End. featured-details -->
                </div><!-- End. col-6 col-lg-3 -->

                <div class="col-6 col-lg-3">
                    <div class="featured-details">
                        <img src="{{ asset('public/frontend/assets/images/all-icons/shopping-bag.png') }}" alt="">
                        <div class="featured-title">
                            <h3>Free Shipping</h3>
                            <p>Free shipping on all your order</p>
                        </div><!-- End. featured-title -->
                    </div><!-- End. featured-details -->
                </div><!-- End. col-6 col-lg-3 -->

                <div class="col-6 col-lg-3">
                    <div class="featured-details">
                        <img src="{{ asset('public/frontend/assets/images/all-icons/box.png') }}" alt="">
                        <div class="featured-title">
                            <h3>Free Shipping</h3>
                            <p>Free shipping on all your order</p>
                        </div><!-- End. featured-title -->
                    </div><!-- End. featured-details -->
                </div><!-- End. col-6 col-lg-3 -->
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. website-featured -->


    <!-- Start Category Section -->
    <section class="category-section">
        <div class="container">
            <div class="row">
                <div class="header-titles">
                    <h1>Popular Categories</h1>
                    <a href="#" class="link_btn">View All <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>

                <div class="category-container">
                    @forelse($popular_categories as $popular_category) 
                    <a href="#" class="category-details">
                        <img src="{{ asset($popular_category->category_img_path) }}"  alt="">
                        <h2>{{$popular_category->category_name}}</h2>
                    </a>
                        <!-- End. category-container -->
                        
                    @empty
                        <span class="text-center">No Categories found</span>
                    @endforelse
                
                </div><!-- End. category-container -->


                <!-- For responsive category-responsive -->
                <div class="owl-carousel owl-theme" id="categorySlider">
                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/fresh_fruit.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->

                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/fresh_vegetables.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->

                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/meat_fish.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->

                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/snacks.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->

                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/beverage.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->

                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/beauty_health.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->

                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/bread_bekary.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->

                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/baking.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->

                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/cooking.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->

                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/diabetic_food.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->

                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/dish_detergent.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->
                    
                    <a href="#" class="category-details">
                        <img src="{{ asset('public/frontend/assets/images/category_image/oil.png') }}" alt="">
                        <h2>Fresh Fruit</h2>
                    </a><!-- End. category-container -->
                </div><!-- End. categorySlider -->
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. category-section -->


    <!-- Start Category Campaign Banner Section -->
    <section class="category-campaign-banner">
        <div class="container">
            <div class="row">
                <div class="category-campaign-container">
                    <div class="category-campaign-setup" style="background-image: url('{{ asset('public/frontend/assets/images/campaign_image/category-banner-1.png') }}');">
                        <div class="left-banner-title">
                            <h1>100% Fresh Cow Milk</h1>
                            <p><span>Starting at</span> $14.99</p>
                            <button class="campaign_btns">Shop Now <i class="fa-solid fa-arrow-right ms-2"></i></button>
                        </div>
                    </div>

                    <div class="category-campaign-setup" style="background-image: url('{{ asset('public/frontend/assets/images/campaign_image/category-banner-2.png') }}');">
                        <div class="right-banner-title">
                            <p style="color: var(--theme-black); margin-bottom: 8px;">Drink Sale</p>
                            <h1 style="color: var(--theme-black);">Water & Soft Drink</h1>
                            <button class="campaign_btns">Shop Now <i class="fa-solid fa-arrow-right ms-2"></i></button>
                        </div>
                    </div>

                    <div class="category-campaign-setup" style="background-image: url('{{ asset('public/frontend/assets/images/campaign_image/category-banner-3.png') }}');">
                        <div class="left-banner-title">
                            <p style="color: var(--theme-black); margin-bottom: 8px;">100% Organic</p>
                            <h1 style="color: var(--theme-black);">Quick Breakfast</h1>
                            <button class="campaign_btns">Shop Now <i class="fa-solid fa-arrow-right ms-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Start Popular Products Section -->
    <section class="popular-products-section">
        <div class="container">
            <div class="row">
                <div class="header-titles">
                    <h1>Popular Products</h1>
                    <a href="#" class="link_btn">View All <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div><!-- End. header-titles -->

                <div class="products-container">
                    @forelse($popular_products as $popular_product) 
                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset($popular_product->productDetail->productThumbnail_img) }}" alt="">
                            <span class="badges sale_badge product-badges">Sale 50%</span>

                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">{{ $popular_product->product_name }}</a>
                                @if(count($popular_product->colors)>0)
                                <p>${{$popular_product->colors[0]->productRegularPrice}} <del><span class="discount-price">${{$popular_product->colors[0]->productSalePrice}}</span></del></p>
                                @endif
                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div>
                        
                    @empty
                    @endforelse
                        
                </div><!-- End. products-container -->

                 <!-- For responsive product-responsive -->
                <div class="owl-carousel owl-theme" id="popularSlider">
                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/apple.png') }}" alt="">
                            <span class="badges sale_badge product-badges">Sale 50%</span>

                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/bakchoy.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/brinjel.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/capsicum.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/cauliflower.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/corn.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/green-paper.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/lettuce.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/orange.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/potato.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->
                </div><!-- End. popularSlider -->

            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. popular-product-section -->


    <!-- Start Campaign Section -->
    <section class="campaign-section">
        <div class="container">
            <div class="row">
               <div class="campaign-container">
                  <div class="monthly-sales-campaign" style="background-image: url('{{ asset('public/frontend/assets/images/campaign_image/monthly-sales-campaign.png') }}');">
                        <h5>Best Deals</h5>
                        <h1>Sale of the Month</h1>
                        <ul class="counter-campaign">
                            <li>
                                <div class="count-time">
                                    <h4>00</h4>
                                    <p>Days</p>
                                </div>
                            </li><!-- End. count-time -->
                            <li>
                                <div class="count-time">
                                    <h4>00</h4>
                                    <p>Hours</p>
                                </div>
                            </li><!-- End. count-time -->
                            <li>
                                <div class="count-time">
                                    <h4>00</h4>
                                    <p>Mins</p>
                                </div><!-- End. count-time -->
                            </li>
                            <li>
                                <div class="count-time">
                                    <h4>00</h4>
                                    <p>Secs</p>
                                </div>
                            </li><!-- End. count-time -->
                        </ul><!-- End. counter-campaign -->
                        <div class="text-center">
                            <button class="btns shop_btn2">Shop Now <i class="fa-solid fa-arrow-right ms-2"></i></button>
                        </div>
                  </div><!-- End. monthly-sales-campaign -->


                  <div class="balanced-health-campaign" style="background-image: url('{{ asset('public/frontend/assets/images/campaign_image/balanced-health.png') }}');">
                        <h5>85% Fat Free</h5>
                        <h1>Low-Fat Meat</h1>
                        <p>Started at <span>$79.99</span></p>
                        <div class="text-center">
                            <button class="btns shop_btn2">Shop Now <i class="fa-solid fa-arrow-right ms-2"></i></button>
                        </div>
                  </div><!-- End. balanced-health-campaign -->


                  <div class="seasonal-campaign" style="background-image: url('{{ asset('public/frontend/assets/images/campaign_image/seasonal-campaign.png') }}');">
                        <h5>Summer Sale</h5>
                        <h1>100% Fresh Fruit</h1>
                        <p>Up to <span class="badges discount_badge">64% OFF</span></p>
                        <div class="text-center">
                            <button class="btns shop_btn2">Shop Now <i class="fa-solid fa-arrow-right ms-2"></i></button>
                        </div>
                  </div><!-- End. seasonal-campaign -->

               </div>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. campaign-section -->


    <!-- Note: Start Hot Deals Section -->
    <section class="hot-deals-section">
        <div class="container">
            <div class="row">
                <div class="hot-deals-container">
                   
                </div>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. hot-deals-section -->


    <!-- Start Campaign Banner Section -->
    <section class="campaign-banner-section">
        <div class="container">
            <div class="campaign-banner-container" style="background-image: url('{{ asset('public/frontend/assets/images/campaign_image/discount_bannar.png') }}');">
                <div class="row">
                    <div class="col-lg-5 offset-lg-7">
                        <div class="campaign-banner-details">
                            <h5>Summer Sale</h5>
                            <h1><span>37%</span> OFF</h1>
                            <p>Free on all your order, Free Shipping and  30 days money-back guarantee</p>
                            <div class="btn-customize">
                                <button class="btns shop_btn">Shop Now <i class="fa-solid fa-arrow-right ms-2"></i></button>
                            </div>
                        </div>
                   </div>
               </div>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. campaign-section -->


    <!-- Start Featured Products Section -->
    <section class="featured-products-section">
        <div class="container">
            <div class="row">
                <div class="header-titles">
                    <h1>Featured Products</h1>
                    <a href="#" class="link_btn">View All <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div><!-- End. header-titles -->

                <div class="products-container">
                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/apple.png') }}" alt="">
                            <span class="badges sale_badge product-badges">Sale 50%</span>

                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/bakchoy.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/brinjel.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/capsicum.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/cauliflower.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/corn.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/green-paper.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/lettuce.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/orange.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/potato.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->
                </div><!-- End. products-container -->

                <!-- For responsive product-responsive -->
                <div class="owl-carousel owl-theme" id="featuredSlider">
                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/apple.png') }}" alt="">
                            <span class="badges sale_badge product-badges">Sale 50%</span>

                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/bakchoy.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/brinjel.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/capsicum.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/cauliflower.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/corn.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/green-paper.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/lettuce.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/orange.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->

                    <div class="products-description">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/assets/images/product_images/potato.png') }}" alt="">
                            <ul class="product-icons-show">
                                <li>
                                    <a href="#">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </li>
                            </ul><!-- End. product-icons-show -->
                        </div><!-- End. product-image -->

                        <div class="product-info">
                            <div class="product-bio">
                                <a href="" class="product-title">Green Apple</a>
                                <p>$14.99 <del><span class="discount-price">$20.99</span></del></p>

                                <div class="product-review">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div><!-- End. client-review -->
                            </div><!-- End. product-image -->

                            <a href="#">
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                        </div><!-- End. product-info -->
                    </div><!-- End. products-description -->
                </div><!-- End. featuredSlider -->

            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. featured-product-section -->


    <!-- Start Blog Section -->
    <section class="blog-section">
        <div class="container">
            <div class="row">
                <h1>Latest News</h1>

                <div class="blog-container">
                    <div class="blog-details">
                        <div class="blog-image-container">
                            <img src="{{ asset('public/frontend/assets/images/blog_image/blog-1.png') }}" alt="">
                            <div class="blog-dates">
                                <p>18</p>
                                <span>Nov</span>
                            </div><!-- End. blog-dates -->
                        </div><!-- End. blog-image-container -->

                        <div class="blog-titles">
                            <ul class="blog-list">
                                <li><i class="ri-bookmark-line"></i> Food</li>
                                <li><i class="ri-user-3-line"></i> By Admin</li>
                                <li><i class="ri-chat-1-line"></i> 65 Comments</li>
                            </ul>
                            <p>Curabitur porttitor orci eget neque accumsan venenatis. Nunc fermentum.</p>
                            <a href="#" class="read-more-btn">Read More <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div><!-- End. blog-titles -->
                    </div><!-- End. blog-details -->

                    <div class="blog-details">
                        <div class="blog-image-container">
                            <img src="{{ asset('public/frontend/assets/images/blog_image/blog-2.png') }}" alt="">
                            <div class="blog-dates">
                                <p>18</p>
                                <span>Nov</span>
                            </div><!-- End. blog-dates -->
                        </div><!-- End. blog-image-container -->

                        <div class="blog-titles">
                            <ul class="blog-list">
                                <li><i class="ri-bookmark-line"></i> Food</li>
                                <li><i class="ri-user-3-line"></i> By Admin</li>
                                <li><i class="ri-chat-1-line"></i> 65 Comments</li>
                            </ul>
                            <p>Curabitur porttitor orci eget neque accumsan venenatis. Nunc fermentum.</p>
                            <a href="#" class="read-more-btn">Read More <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div><!-- End. blog-titles -->
                    </div><!-- End. blog-details -->

                    <div class="blog-details">
                        <div class="blog-image-container">
                            <img src="{{ asset('public/frontend/assets/images/blog_image/blog-3.png') }}" alt="">
                            <div class="blog-dates">
                                <p>18</p>
                                <span>Nov</span>
                            </div><!-- End. blog-dates -->
                        </div><!-- End. blog-image-container -->

                        <div class="blog-titles">
                            <ul class="blog-list">
                                <li><i class="ri-bookmark-line"></i> Food</li>
                                <li><i class="ri-user-3-line"></i> By Admin</li>
                                <li><i class="ri-chat-1-line"></i> 65 Comments</li>
                            </ul>
                            <p>Curabitur porttitor orci eget neque accumsan venenatis. Nunc fermentum.</p>
                            <a href="" class="read-more-btn">Read More <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div><!-- End. blog-titles -->
                    </div><!-- End. blog-details -->
                </div><!-- End. blog-container -->
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. Blog-section -->


    <!-- Start Testimonial Section -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="testimonial-title">
                <h1>Client Testimonial</h1>
                <div class="verticle-line"></div>
                </div><!-- End. row -->

                <!-- <div class="col-lg-4"> -->
                <div class="owl-carousel owl-theme" id="testimonial">
                    <div class="testimonial-card item">
                        <i class='bx bxs-quote-alt-right'></i>
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-1.png') }}" alt="">
                                <div class="client-details">
                                    <h4>Robert Fox</h4>
                                    <p>Customer</p>
                                </div><!-- End. client-details -->
                            </div><!-- End. client-bio -->

                            <div class="client-review">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div><!-- End. client-review -->
                        </div><!-- End. our-client -->
                    </div><!-- End. testimonial-card -->

                    <div class="testimonial-card item">
                        <i class='bx bxs-quote-alt-right'></i>
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-2.png') }}" alt="">
                                <div class="client-details">
                                    <h4>Robert Fox</h4>
                                    <p>Customer</p>
                                </div><!-- End. client-details -->
                            </div><!-- End. client-bio -->

                            <div class="client-review">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div><!-- End. client-review -->
                        </div><!-- End. our-client -->
                    </div><!-- End. testimonial-card -->

                    <div class="testimonial-card item">
                        <i class='bx bxs-quote-alt-right'></i>
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-3.png') }}" alt="">
                                <div class="client-details">
                                    <h4>Robert Fox</h4>
                                    <p>Customer</p>
                                </div><!-- End. client-details -->
                            </div><!-- End. client-bio -->

                            <div class="client-review">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div><!-- End. client-review -->
                        </div><!-- End. our-client -->
                    </div><!-- End. testimonial-card -->

                    <div class="testimonial-card item">
                        <i class='bx bxs-quote-alt-right'></i>
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-3.png') }}" alt="">
                                <div class="client-details">
                                    <h4>Robert Fox</h4>
                                    <p>Customer</p>
                                </div><!-- End. client-details -->
                            </div><!-- End. client-bio -->

                            <div class="client-review">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div><!-- End. client-review -->
                        </div><!-- End. our-client -->
                    </div><!-- End. testimonial-card -->
                </div><!-- End. testimonial -->
                
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. testimonial-section -->


    <!-- Start Business Logo Section -->
    <section class="business-logo-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme" id="businessLogo">
                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/assets/images/business_logo/logo-1.png') }}" alt="">
                        </div>

                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/assets/images/business_logo/logo-2.png') }}" alt="">
                        </div>

                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/assets/images/business_logo/logo-3.png') }}" alt="">
                        </div>

                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/assets/images/business_logo/logo-4.png') }}" alt="">
                        </div>

                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/assets/images/business_logo/logo-5.png') }}" alt="">
                        </div>

                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/assets/images/business_logo/logo-6.png') }}" alt="">
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section><!-- End. Business Logo Section -->
    

    <!-- Start Subscription Section -->
    <section class="subscription-section">
        <div class="container">
            <div class="subscription-container">
                <div class="subscription-details">
                    <h2>Subcribe our Newsletter</h2>
                    <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna.</p>
                </div><!-- End. subscription-details --> 


                <div class="subscription">
                    <form action="">
                        <input type="text" class="subscription-form" placeholder="Your email address">
                        <button class="btns default_btn btn_position">Subscriptions</button>
                    </form>
                </div><!-- End. subscription -->
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. subscription-section -->


    <!-- Subscription include -->
    @include('frontend.include.subscription')

@endsection


@push('add-scripts')

<script>
    // Testimonial section 
    $('#testimonial').owlCarousel({
        loop:true,
        margin:30,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        navText: ['<i class="fa-solid fa-arrow-left"></i>' , '<i class="fa-solid fa-arrow-right"></i>'],
        responsive:{
            0:{
                nav: true,
                items:1
            },
            780:{
                nav: true,
                items: 2
            },
            1000:{
                nav: true,
                items:3
            },
        }
    })


    // Category section 
    $('#categorySlider').owlCarousel({
        loop:true,
        margin:30,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        navText: ['<i class="fa-solid fa-arrow-left"></i>' , '<i class="fa-solid fa-arrow-right"></i>'],
        responsive:{
            0:{
                nav: true,
                dots: false,
                items:2
            },
            600:{
                nav: true,
                dots: false,
                items:3
            },
            768:{
                nav: true,
                dots: false,
                items: 4
            },
            992:{
                nav: false,
                dots: false,
                items:6
            },
        }
    })


    // Popular Products section 
    $('#popularSlider').owlCarousel({
        loop:true,
        margin:10,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        navText: ['<i class="fa-solid fa-arrow-left"></i>' , '<i class="fa-solid fa-arrow-right"></i>'],
        responsive:{
            0:{
                nav: true,
                dots: false,
                items:1
            },
            360:{
                nav: true,
                dots: false,
                items:2
            },
            600:{
                nav: true,
                dots: false,
                items:3
            },
            768:{
                nav: true,
                dots: false,
                items: 4
            },
            992:{
                nav: false,
                dots: false,
                items:6
            },
        }
    })


    // Featured Products section 
    $('#featuredSlider').owlCarousel({
        loop:true,
        margin:10,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        navText: ['<i class="fa-solid fa-arrow-left"></i>' , '<i class="fa-solid fa-arrow-right"></i>'],
        responsive:{
            0:{
                nav: true,
                dots: false,
                items:1
            },
            360:{
                nav: true,
                dots: false,
                items:2
            },
            600:{
                nav: true,
                dots: false,
                items:3
            },
            768:{
                nav: true,
                dots: false,
                items: 4
            },
            992:{
                nav: false,
                dots: false,
                items:6
            },
        }
    })


    // Business Logo section 
    $('#businessLogo').owlCarousel({
        loop:true,
        margin:10,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        navText: ['<i class="fa-solid fa-arrow-left"></i>' , '<i class="fa-solid fa-arrow-right"></i>'],
        responsive:{
            0:{
                nav: false,
                dots: false,
                items: 2
            },
            500:{
                nav: false,
                dots: false,
                items: 3
            },
            768:{
                nav: false,
                dots: false,
                items: 4
            },
            992:{
                nav: false,
                dots: false,
                items: 6
            },
        }
    })



    // Business Logo section 
    $('#bannerSlider').owlCarousel({
        loop:true,
        margin:10,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        navText: ['<i class="fa-solid fa-arrow-left"></i>' , '<i class="fa-solid fa-arrow-right"></i>'],
        responsive:{
            0:{
                nav: false,
                dots: true,
                items: 1
            },
            577:{
                nav: true,
                dots: false,
                items: 1
            },
            768:{
                nav: true,
                dots: false,
                items: 1
            },
            992:{
                nav: true,
                dots: false,
                items: 1
            },
        }
    })

</script>

@endpush