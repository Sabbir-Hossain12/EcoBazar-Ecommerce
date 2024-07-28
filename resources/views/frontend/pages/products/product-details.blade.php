

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
                                    <i class="bx bx-home"></i>  <i class="bx bx-chevron-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span>Category</span>
                                    <i class="bx bx-chevron-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span>Vegetables </span>
                                    <i class="bx bx-chevron-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    Chinese Cabbage
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Product Details Page section -->
    <section class="product-details-section">
        <div class="container">
            <div class="main-product-control-div">
               <div class="main-product-image-container">
                  <div class="single-product-image-container">
                     <div class="single-product-image">
                        <img src="{{ asset('public/frontend/assets/images/product-details-multiple-image/main-product.png') }}" alt="">
                     </div>

                     <div class="multiple-product-image-show">
                        <div class="owl-carousel owl-theme" id="multi-product-slider">
                            <img src="{{ asset('public/frontend/assets/images/product_images/bakchoy.png') }}" alt="" class="slider_images">
                            <img src="{{ asset('public/frontend/assets/images/product_images/brinjel.png') }}" alt="" class="slider_images">
                            <img src="{{ asset('public/frontend/assets/images/product_images/lettuce.png') }}" alt="" class="slider_images">
                            <img src="{{ asset('public/frontend/assets/images/product_images/capsicum.png') }}" alt="" class="slider_images">
                            <img src="{{ asset('public/frontend/assets/images/product_images/orange.png') }}" alt="" class="slider_images">
                        </div>
                     </div>
                  </div>
               </div>

               <div class="main-product-details-show">
                  <div class="single-product-details-show">
                      <div class="product-heading-title">
                           <h1>Chinese Cabbage</h1>
                           <p><span class="">In Stock</span></p>
                      </div>

                      <div class="product-rating-sku">
                          <div class="product-rating-review">
                              <div class="ratings-review">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                              </div>

                              <span>4 Review</span>
                          </div>

                           <div class="middle-dot"></div>
                           <p><span>SKU:</span> 2,51,594</p>
                      </div>

                      <div class="product-price">
                         <p><del>$48.00</del> $17.28</p>
                         <span class="discount-rate">64% Off</span>
                      </div>

                      <div class="product-social-brand-show">
                          <div class="product-brand-show">
                              <p>Brands: <img src="{{ asset('public/frontend/assets/images/brand_logo/farmasy.png') }}" alt=""></p>
                          </div>

                          <div class="share-products-social-media">
                            <h4>Share Item:</h4>
                            <ul>
                                <li>
                                    <a href="">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa-brands fa-pinterest-p"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                          </div>
                      </div>

                      <div class="product-short-description">
                           <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nibh diam, blandit vel consequat nec, ultrices et ipsum. Nulla varius magna a consequat pulvinar. </p>
                      </div>

                      <div class="products-quantity">
                         <div class="cart-quantity">
                            <i class="bx bx-minus"></i>
                            <input type="number" class="quantity" readonly="" value="1" min="1" max="10">
                            <i class="bx bx-plus"></i>
                         </div>

                        <div class="product-action-buttons">
                            <button class="product-cart-action-btn">
                                Add to Cart<i class="bx bx-shopping-bag"></i>
                            </button>
 
                            <button class="product-wishlist-action-btn"><i class="bx bx-heart"></i></button>
                        </div>
                      </div>

                      <div class="products-list-details">
                          <p><span>Category:</span> Vegetables</p>
                          <p><span>Tag:</span> Green Cabbage, Vegetables, Healthy, Chinese Cabbage</p>
                      </div>
                  </div>
               </div>
            </div><!-- End. row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="products-tab-menu-list">
                       <ul>
                          <li class="product-tab-menu active_desc">Descriptions</li>
                          <li class="product-tab-menu">Additional Information</li>
                          <li class="product-tab-menu">Customer Feedback</li>
                       </ul>

                       <!-- All Description contents show here -->
                       <div class="description-contents active_desc">
                           <div class="product-description-container">
                                <div class="product-description">
                                    <p>Sed commodo aliquam dui ac porta. Fusce ipsum felis, imperdiet at posuere ac, viverra at mauris. Maecenas tincidunt ligula a sem vestibulum pharetra. Maecenas auctor tortor lacus, nec laoreet nisi porttitor vel. Etiam tincidunt metus vel dui interdum sollicitudin. Mauris sem ante, vestibulum nec orci vitae, aliquam mollis lacus. Sed et condimentum arcu, id molestie tellus. Nulla facilisi. Nam scelerisque vitae justo a convallis. Morbi urna ipsum, placerat quis commodo quis, egestas elementum leo. Donec convallis mollis enim. Aliquam id mi quam. Phasellus nec fringilla elit.</p>
                                    <p>Nulla mauris tellus, feugiat quis pharetra sed, gravida ac dui. Sed iaculis, metus faucibus elementum tincidunt, turpis mi viverra velit, pellentesque tristique neque mi eget nulla. Proin luctus elementum neque et pharetra. </p>
    
                                    <ul>
                                        <li>100 g of fresh leaves provides.</li>
                                        <li>Aliquam ac est at augue volutpat elementum.</li>
                                        <li>Quisque nec enim eget sapien molestie.</li>
                                        <li>Proin convallis odio volutpat finibus posuere.</li>
                                    </ul>
                                </div>

                                <div class="product-videos">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/NdkgIXtKMW0?si=FpN9694kGiTtGieB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                           </div> 
                      </div>

                      <div class="description-contents">
                        <div class="product-description-container">
                            <div class="additional-info">
                                <ul>
                                    <li>
                                        <div class="product-full-bio">
                                            <h4>Weight:</h4>
                                            <span>03</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-full-bio">
                                            <h4>Color:</h4>
                                            <span>Green</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-full-bio">
                                            <h4>Type:</h4>
                                            <span>Organic</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-full-bio">
                                            <h4>Category:</h4>
                                            <span>Vegetables</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-full-bio">
                                            <h4>Stock Status:</h4>
                                            <span>Available (5,413)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-full-bio">
                                            <h4>Tags:</h4>
                                            <span>Vegetables, Healthy, Green Cabbage, Chinese, Cabbage</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-videos">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/NdkgIXtKMW0?si=FpN9694kGiTtGieB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                         </div>
                      </div>
                      
                      <div class="description-contents">
                        <div class="product-description-container" style="align-items: start;">
                            <div class="customer-feedback">
                                <div class="customer-message">
                                    <div class="customer-content">
                                        <div class="customer-bio">
                                            <img src="{{ asset('public/frontend/assets/images/customer_review/Profile.png') }}" alt="">
    
                                            <div class="customer-ratings">
                                                <h5>Kristin Watson</h5>
    
                                                <div class="star-ratings">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <span>2 min ago</span>
                                    </div>
    
                                    <p>Duis at ullamcorper nulla, eu dictum eros.</p>
                                </div>

                                <div class="customer-message">
                                    <div class="customer-content">
                                        <div class="customer-bio">
                                            <img src="{{ asset('public/frontend/assets/images/customer_review/Image.png') }}" alt="">
    
                                            <div class="customer-ratings">
                                                <h5>Jane Cooper</h5>
    
                                                <div class="star-ratings">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <span>30 Apr, 2021</span>
                                    </div>
    
                                    <p>Keep the soil evenly moist for the healthiest growth. If the sun gets too hot, Chinese cabbage tends to "bolt" or go to seed; in long periods of heat, some kind of shade may be helpful. Watch out for snails, as they will harm the plants.</p>
                                </div>

                                <div class="customer-message">
                                    <div class="customer-content">
                                        <div class="customer-bio">
                                            <img src="{{ asset('public/frontend/assets/images/customer_review/Profile.png') }}" alt="">
    
                                            <div class="customer-ratings">
                                                <h5>Kristin Watson</h5>
    
                                                <div class="star-ratings">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <span>2 min ago</span>
                                    </div>
    
                                    <p>Duis at ullamcorper nulla, eu dictum eros.</p>
                                </div>

                                <div class="customer-message">
                                    <div class="customer-content">
                                        <div class="customer-bio">
                                            <img src="{{ asset('public/frontend/assets/images/customer_review/Image.png') }}" alt="">
    
                                            <div class="customer-ratings">
                                                <h5>Jane Cooper</h5>
    
                                                <div class="star-ratings">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <span>30 Apr, 2021</span>
                                    </div>
    
                                    <p>Keep the soil evenly moist for the healthiest growth. If the sun gets too hot, Chinese cabbage tends to "bolt" or go to seed; in long periods of heat, some kind of shade may be helpful. Watch out for snails, as they will harm the plants.</p>
                                </div>
    
                            </div>

                            <div class="customer-review">
                                <h3>Reviews</h3>

                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="review_label" for="name">Name</label>
                                                <input type="text" name="name" id="name" class="normal-forms" placeholder="Enter Your Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="review_label" for="email">Email</label>
                                                <input type="email" name="email" id="email" class="normal-forms" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="review_label" for="ratings">Ratings</label>
                                        <select class="select-form-decoration" name="ratings" id="ratings">
                                            <option value="" disabled selected>Select Ratings</option>
                                            <option value="1">1 Star</option>
                                            <option value="2">2 Star</option>
                                            <option value="3">3 Star</option>
                                            <option value="4">4 Star</option>
                                            <option value="5">5 Star</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="review_label" for="text_review">Text Review</label>
                                        <textarea name="text_review" class="normal-forms" style="height: 100px;" id="text_review" placeholder="Write Message"></textarea>
                                    </div>

                                    <button type="submit" class="review-btn">Submit Your Reviews</button>
                                </form>
                            </div>
                         </div>
                      </div>
                    </div>
                </div>
            </div>

            <!-- Related Product section -->
            <div class="row">
                <div class="relatedProductSlider">
                    <div class="header-titles" style="justify-content: center;">
                        <h1>Related Products</h1>
                    </div><!-- End. header-titles -->
    
                    <!-- For responsive product-responsive -->
                    <div class="owl-carousel owl-theme" id="relatedSlider">
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
                </div><!-- End. RelatedProductSlider -->
            </div><!-- End. row -->

        </div><!-- End. container -->
    </section><!-- End. product-details-section -->


    <!-- Subscription include -->
    @include('frontend.include.subscription')

@endsection


@push('add-scripts')

<script>
    // multiple product slider section 
    $('#multi-product-slider').owlCarousel({
        loop:true,
        margin: 10,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        navText: ['<i class="fa-solid fa-chevron-left"></i>' , '<i class="fa-solid fa-chevron-right"></i>'],
        responsive:{
            0:{
                nav: true,
                dots: false,
                items: 2
            },
            400:{
                nav: true,
                dots: false,
                items: 3
            },
            577:{
                nav: true,
                dots: false,
                items: 4
            },
            992:{
                nav: true,
                dots: false,
                items: 4
            },
        }
    })


    // Related product slider section 
    $('#relatedSlider').owlCarousel({
        loop:true,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: false,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        navText: ['<i class="fa-solid fa-chevron-left"></i>' , '<i class="fa-solid fa-chevron-right"></i>'],
        responsive:{
            0:{
                nav: true,
                dots: false,
                items: 2
            },
            577:{
                nav: true,
                dots: false,
                items: 2
            },
            768:{
                nav: true,
                dots: false,
                items: 4
            },
            992:{
                nav: true,
                dots: false,
                items: 4
            },
        }
    })
</script>

@endpush