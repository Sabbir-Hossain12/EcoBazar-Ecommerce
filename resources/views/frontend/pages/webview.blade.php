@extends('frontend.layout.master')

@push('titles')
    EcoBazaar - Bootstrap eCommerce Template
@endpush

@push('add-css')

    <style>

        /* Only for ( Banner section ) */
        .banner-page {
            /*background-color: #EDF2EE;*/
            background: url("{{asset('public/backend/assets/images/uploads/banners/1725709289.webp')}}") no-repeat center center;
            background-size: cover;
        }

        .banner-details span {
            color: var(--theme-green);
        }

        .banner-details h1 {
            color: var(--theme-black);
        }

        .banner-details h5 {
            color: var(--theme-black);
        }

        .banner-details h5 span {
            color: var(--theme-orange);
        }

        .banner-details p {
            color: var(--theme-paragraph-1);
        }

        .btn-color-change {
            background-color: var(--theme-green);
            color: var(--theme-white);
            border: 1px solid var(--theme-green);
        }

        .btn-color-change:hover {
            background-color: var(--theme-white);
            color: var(--theme-green);
            border: 1px solid var(--theme-green);
        }

        #bannerSlider button.owl-prev {
            background: var(--theme-white);
            color: var(--theme-green);
            border: 2px solid var(--theme-green);
        }

        #bannerSlider button.owl-next {
            background: var(--theme-white);
            color: var(--theme-green);
            border: 2px solid var(--theme-green);
        }

        #bannerSlider button.owl-next:hover,
        #bannerSlider button.owl-prev:hover {
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
                        @foreach($sliders as $slider)
                            <div class="banner-page">


                            {{--                                <div class="banner-details order-first">--}}
                            {{--                                    <span>{{$slider->slider_title_1}}</span>--}}
                            {{--                                    <h1>{{$slider->slider_title_2}}</h1>--}}
                            {{--                                    <h5>{!! $slider->slider_title_3!!}</h5>--}}
                            {{--                                    <p>{{$slider->slider_text}}</p>--}}
                            {{--                                    <a href="{{$slider->slider_btn_link}}"--}}
                            {{--                                       class="banner-btn">{{$slider->slider_btn_name}} <i--}}
                            {{--                                                class="fa-solid fa-arrow-right ms-2"></i></a>--}}
                            {{--                                </div>--}}

                            {{--                                <div class="banner-images order-second">--}}
                            {{--                                    <img class="rounded" src="{{ asset($slider->slider_img) }}" alt="">--}}
                            {{--                                </div>--}}

                    </div>
                    @endforeach

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
                    <a href="{{route('product.all')}}" class="link_btn">View All <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>

                <div class="category-container">
                    @forelse($popular_categories as $popular_category)
                        <a href="{{route('product.by.category', $popular_category->slug)}}" class="category-details">
                            <img src="{{ asset($popular_category->category_img_path) }}" alt="">
                            <h2>{{$popular_category->category_name}}</h2>
                        </a>
                        <!-- End. category-container -->

                    @empty
                        <span class="text-center">No Categories found</span>
                    @endforelse

                </div><!-- End. category-container -->


                <!-- For responsive category-responsive -->
                <div class="owl-carousel owl-theme" id="categorySlider">

                    @forelse($popular_categories as $popular_category)
                        <a href="#" class="category-details">
                            <img src="{{ asset($popular_category->category_img_path) }}" alt="">
                            <h2>{{$popular_category->category_name}}</h2>
                        </a>
                    @empty
                    @endforelse

                </div><!-- End. categorySlider -->
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. category-section -->


    <!-- Start Category Campaign Banner Section -->
    @if(count($smallBanners)>0)
        <section class="category-campaign-banner">
            <div class="container">
                <div class="row">
                    <div class="category-campaign-container">

                        @foreach($smallBanners as $banner)
                            <div class="category-campaign-setup"
                                 style="background-image: url('{{ asset($banner->banner_img) }}');">
                                <div class="left-banner-title">
                                    <h1>{{$banner->banner_title_1}}</h1>
                                    <p>{{$banner->banner_title_2}}</p>
                                    <a href="{{$banner->banner_btn_link}}"
                                       class="campaign_btns">{{$banner->banner_btn_name}} <i
                                                class="fa-solid fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

    @endif


    <!-- Start Popular Products Section -->
    <section class="popular-products-section">
        <div class="container">
            <div class="row">
                <div class="header-titles">
                    <h1>Popular Products</h1>
                    <a href="{{route('product.all')}}" class="link_btn">View All <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div><!-- End. header-titles -->

                <div class="products-container">
                    @forelse($popular_products as $popular_product)
                        <div class="products-description">
                            <div class="product-image">
                                <a href="{{url('/product-details/'.$popular_product->slug)}}"> <img
                                            src="{{ asset($popular_product->productDetail->productThumbnail_img) }}"
                                            alt=""></a>
                                @if(count($popular_product->colors)>0)
                                    <span class="badges sale_badge product-badges">Sale {{$popular_product->colors[0]->discount_percentage}}%</span>
                                @elseif(count($popular_product->weights)>0)
                                    <span class="badges sale_badge product-badges">Sale {{$popular_product->weights[0]->discount_percentage}}%</span>
                                @else
                                    <span class="badges new_badge product-badges">Sale {{$popular_product->sizes[0]->discount_percentage}}%</span>

                                @endif

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
                                    <a href="{{url('/product-details/'.$popular_product->slug)}}"
                                       class="product-title">{{ $popular_product->product_name }}</a>
                                    @if(count($popular_product->colors)>0)
                                        <p>${{$popular_product->colors[0]->productRegularPrice}}
                                            <del>
                                                <span class="discount-price">${{$popular_product->colors[0]->productSalePrice}}</span>
                                            </del>
                                        </p>
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


                    @forelse($popular_products as $popular_product)
                        <div class="products-description">
                            <div class="product-image">
                                <a href="{{url('/product-details/'.$popular_product->slug)}}"> <img
                                            src="{{ asset($popular_product->productDetail->productThumbnail_img) }}"
                                            alt=""></a>
                                @if(count($popular_product->colors)>0)
                                    <span class="badges sale_badge product-badges">Sale {{$popular_product->colors[0]->discount_percentage}}%</span>
                                @elseif(count($popular_product->weights)>0)
                                    <span class="badges sale_badge product-badges">Sale {{$popular_product->weights[0]->discount_percentage}}%</span>
                                @else
                                    <span class="badges new_badge product-badges">Sale {{$popular_product->sizes[0]->discount_percentage}}%</span>

                                @endif

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
                                    <a href="{{url('/product-details/'.$popular_product->slug)}}"
                                       class="product-title">{{ $popular_product->product_name }}</a>
                                    @if(count($popular_product->colors)>0)
                                        <p>${{$popular_product->colors[0]->productRegularPrice}}
                                            <del>
                                                <span class="discount-price">${{$popular_product->colors[0]->productSalePrice}}</span>
                                            </del>
                                        </p>
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
                </div>

            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. popular-product-section -->


    <!-- Start Campaign Section -->
    @if(count($mediumBanners)>0)
        <section class="campaign-section">
            <div class="container">
                <div class="row">
                    <div class="campaign-container">

                        @forelse($mediumBanners as $mediumBanner)
                            <div class="monthly-sales-campaign"
                                 style="background-image: url('{{ asset('public/frontend/assets/images/campaign_image/monthly-sales-campaign.png') }}');">
                                <h5>{{$mediumBanner->banner_title_1}}</h5>
                                <h1>{{$mediumBanner->banner_title_2}}</h1>
                                <p class="text-center mb-4">{{$mediumBanner->banner_title_3}}></p>
                                <!-- End. counter-campaign -->
                                <div class="text-center">
                                    <a href="{{$mediumBanner->banner_btn_link}}"
                                       class="btns shop_btn2">{{$mediumBanner->banner_btn_name}} <i
                                                class="fa-solid fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div><!-- End. monthly-sales-campaign -->
                        @empty
                        @endforelse
                    </div>
                </div><!-- End. row -->
            </div><!-- End. container -->
        </section><!-- End. campaign-section -->

    @endif
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
            <div class="campaign-banner-container"
                 style="background-image: url('{{ asset('public/frontend/assets/images/campaign_image/discount_bannar.png') }}');">
                <div class="row">
                    <div class="col-lg-5 offset-lg-7">
                        <div class="campaign-banner-details">
                            <h5>{{$largeBanner->banner_title_1}}</h5>
                            <h1>{{$largeBanner->banner_title_2}}</h1>
                            <p>{{$largeBanner->banner_title_3}}</p>
                            <div class="btn-customize">
                                <a href="{{$largeBanner->banner_btn_link}}"
                                   class="btns shop_btn">{{$largeBanner->banner_btn_name}} <i
                                            class="fa-solid fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. campaign-section -->


    <!-- Start Featured Products Section -->
    @if(count($featured_products)>0)
        <section class="featured-products-section">
            <div class="container">
                <div class="row">
                    <div class="header-titles">
                        <h1>Featured Products</h1>
                        <a href="{{route('product.all')}}" class="link_btn">View All <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div><!-- End. header-titles -->

                    <div class="products-container">


                        @forelse($featured_products as $popular_product)
                            <div class="products-description">
                                <div class="product-image">
                                    <a href="{{url('/product-details/'.$popular_product->slug)}}"> <img
                                                src="{{ asset($popular_product->productDetail->productThumbnail_img) }}"
                                                alt=""></a>
                                    @if(count($popular_product->colors)>0)
                                        <span class="badges sale_badge product-badges">Sale {{$popular_product->colors[0]->discount_percentage}}%</span>
                                    @elseif(count($popular_product->weights)>0)
                                        <span class="badges sale_badge product-badges">Sale {{$popular_product->weights[0]->discount_percentage}}%</span>
                                    @else
                                        <span class="badges new_badge product-badges">Sale {{$popular_product->sizes[0]->discount_percentage}}%</span>

                                    @endif

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
                                        <a href="{{url('/product-details/'.$popular_product->slug)}}"
                                           class="product-title">{{ $popular_product->product_name }}</a>
                                        @if(count($popular_product->colors)>0)
                                            <p>${{$popular_product->colors[0]->productRegularPrice}}
                                                <del>
                                                    <span class="discount-price">${{$popular_product->colors[0]->productSalePrice}}</span>
                                                </del>
                                            </p>
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
                    <div class="owl-carousel owl-theme" id="featuredSlider">


                        @forelse($featured_products as $popular_product)
                            <div class="products-description">
                                <div class="product-image">
                                    <a href="{{url('/product-details/'.$popular_product->slug)}}"> <img
                                                src="{{ asset($popular_product->productDetail->productThumbnail_img) }}"
                                                alt=""></a>
                                    @if(count($popular_product->colors)>0)
                                        <span class="badges sale_badge product-badges">Sale {{$popular_product->colors[0]->discount_percentage}}%</span>
                                    @elseif(count($popular_product->weights)>0)
                                        <span class="badges sale_badge product-badges">Sale {{$popular_product->weights[0]->discount_percentage}}%</span>
                                    @else
                                        <span class="badges new_badge product-badges">Sale {{$popular_product->sizes[0]->discount_percentage}}%</span>

                                    @endif

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
                                        <a href="{{url('/product-details/'.$popular_product->slug)}}"
                                           class="product-title">{{ $popular_product->product_name }}</a>
                                        @if(count($popular_product->colors)>0)
                                            <p>${{$popular_product->colors[0]->productRegularPrice}}
                                                <del>
                                                    <span class="discount-price">${{$popular_product->colors[0]->productSalePrice}}</span>
                                                </del>
                                            </p>
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
                    </div>

                </div>
            </div>
        </section>

    @endif


    <!-- End. featured-product-section -->


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
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu
                            magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-1.png') }}"
                                     alt="">
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
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu
                            magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-2.png') }}"
                                     alt="">
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
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu
                            magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-3.png') }}"
                                     alt="">
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
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu
                            magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-3.png') }}"
                                     alt="">
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
                    <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu
                        magna.</p>
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
            loop: true,
            margin: 30,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
            responsive: {
                0: {
                    nav: true,
                    items: 1
                },
                780: {
                    nav: true,
                    items: 2
                },
                1000: {
                    nav: true,
                    items: 3
                },
            }
        })


        // Category section 
        $('#categorySlider').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
            responsive: {
                0: {
                    nav: true,
                    dots: false,
                    items: 2
                },
                600: {
                    nav: true,
                    dots: false,
                    items: 3
                },
                768: {
                    nav: true,
                    dots: false,
                    items: 4
                },
                992: {
                    nav: false,
                    dots: false,
                    items: 6
                },
            }
        })


        // Popular Products section 
        $('#popularSlider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
            responsive: {
                0: {
                    nav: true,
                    dots: false,
                    items: 1
                },
                360: {
                    nav: true,
                    dots: false,
                    items: 2
                },
                600: {
                    nav: true,
                    dots: false,
                    items: 3
                },
                768: {
                    nav: true,
                    dots: false,
                    items: 4
                },
                992: {
                    nav: false,
                    dots: false,
                    items: 6
                },
            }
        })


        // Featured Products section 
        $('#featuredSlider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
            responsive: {
                0: {
                    nav: true,
                    dots: false,
                    items: 1
                },
                360: {
                    nav: true,
                    dots: false,
                    items: 2
                },
                600: {
                    nav: true,
                    dots: false,
                    items: 3
                },
                768: {
                    nav: true,
                    dots: false,
                    items: 4
                },
                992: {
                    nav: false,
                    dots: false,
                    items: 6
                },
            }
        })


        // Business Logo section 
        $('#businessLogo').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
            responsive: {
                0: {
                    nav: false,
                    dots: false,
                    items: 2
                },
                500: {
                    nav: false,
                    dots: false,
                    items: 3
                },
                768: {
                    nav: false,
                    dots: false,
                    items: 4
                },
                992: {
                    nav: false,
                    dots: false,
                    items: 6
                },
            }
        })


        // Business Logo section 
        $('#bannerSlider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
             navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
            responsive: {
                0: {
                    nav: false,
                    dots: true,
                    items: 1
                },
                577: {
                    nav: true,
                    dots: false,
                    items: 1
                },
                768: {
                    nav: true,
                    dots: false,
                    items: 1
                },
                992: {
                    nav: false,
                    dots: true,
                    items: 1
                },
            }
        })

    </script>

@endpush