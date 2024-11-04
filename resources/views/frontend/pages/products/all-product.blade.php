@extends('frontend.layout.master')

@push('titles')
    EcoBazaar - Bootstrap eCommerce Template
@endpush

@push('add-css')

@endpush

@section('body-content')

    <!-- start Breadcrumb section -->
    <section class="breadcrumb-section">
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
                                <a href="{{route('product.all')}}">
                                    All Products
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Start Shop Page section -->
    <section class="shop-page-section">
        <div class="container">
            <div class="row">
               <div class="col-lg-3">
                   <div class="product-filter-left-sidebar-overlay"></div>
                   <div class="product-filter-left-sidebar">
                       <i class="fa-solid fa-xmark" id="responsive-filter-sidebar"></i>
                       <button class="filter-clear-btn">Clear <i class='bx bx-x'></i></button>

                       <!-- Category-list filter -->
                       <div class="category-list-filter">
                          <div class="product-filter-toggle">
                            <div class="filter-toggle-title">
                                 <h4>All Categories</h4>
                                 <i class='bx bx-chevron-down'></i>
                            </div>
 
                            <div class="bulk-list-data">
                                 <ul class="">
                                     @forelse($categories as $key=>$category)
                                     <li>
                                        
                                     <a class="category-list" type="button" data-val="0" data-id="{{$key+1}}" >
                                         <div class="circle-radio"></div>
                                         <p>{{$category->category_name}} <span>({{count($category->products)}})</span></p>
                                     </a>
                                     </li>
                                   @empty
                                     
                                     @endforelse
                                 </ul>
                            </div>
                         </div>
                       </div>

                       <!-- Price Range filter -->
                       <div class="price-range-filter">
                            <div class="product-filter-toggle">
                                <div class="filter-toggle-title">
                                    <h4>Price Range</h4>
                                    <i class='bx bx-chevron-down'></i>
                                </div>

                                <div class="bulk-list-data">
                                    <div class="main-range">
                                        <div class="range-slider">
                                            <div class="slider-progress"></div>
                                        </div>
    
                                        <div class="range-input">
                                            <input type="range" name="" class="range-min" min="0" max="5000" value="1000" >
                                            <input type="range" name="" class="range-max" min="0" max="5000" value="4000" >
                                        </div>

                                        <div class="input-price">
                                            <span>Price: </span>
                                            <input type="number" class="min-price" value="1000">
                                            <div class="divider"></div>
                                            <input type="number" class="max-price" value="4000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Rating-list filter -->
                        <div class="rating-list-filter">
                            <div class="product-filter-toggle">
                                <div class="filter-toggle-title">
                                    <h4>Rating</h4>
                                    <i class='bx bx-chevron-down'></i>
                               </div>
    
                               <div class="bulk-list-data">
                                  <ul>
                                     <li>
                                        <div class="rating-checked">
                                            <input type="checkbox" class="rating-input" value="5" id="star-5">
                                            <label for="star-5" class="rating-star">
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-orange'></i>
                                            </label>
                                            <span>5.0</span>
                                        </div>
                                     </li>

                                     <li>
                                        <div class="rating-checked">
                                            <input type="checkbox" class="rating-input" value="4" id="star-4">
                                            <label for="star-4" class="rating-star">
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-ash'></i>
                                            </label>
                                            <span>4.0 & up</span>
                                        </div>
                                     </li>

                                     <li>
                                        <div class="rating-checked">
                                            <input type="checkbox" class="rating-input" value="3" id="star-3">
                                            <label for="star-3" class="rating-star">
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-ash'></i>
                                                <i class='bx bxs-star star-ash'></i>
                                            </label>
                                            <span>3.0 & up</span>
                                        </div>
                                     </li>

                                     <li>
                                        <div class="rating-checked">
                                            <input type="checkbox" class="rating-input" value="2" id="star-2">
                                            <label for="star-2" class="rating-star">
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-ash'></i>
                                                <i class='bx bxs-star star-ash'></i>
                                                <i class='bx bxs-star star-ash'></i>
                                            </label>
                                            <span>2.0 & up</span>
                                        </div>
                                     </li>

                                     <li>
                                        <div class="rating-checked">
                                            <input type="checkbox" class="rating-input" value="1" id="star-1">
                                            <label for="star-1" class="rating-star">
                                                <i class='bx bxs-star star-orange'></i>
                                                <i class='bx bxs-star star-ash'></i>
                                                <i class='bx bxs-star star-ash'></i>
                                                <i class='bx bxs-star star-ash'></i>
                                                <i class='bx bxs-star star-ash'></i>
                                            </label>
                                            <span>1.0 & up</span>
                                        </div>
                                     </li>
                                  </ul>
                               </div>
                            </div>
                        </div>
                       
                   </div>
               </div>

               <div class="col-lg-9">
                  <div class="main-product-filter">

                    <div class="product-sort-quantity">
                        <div class="product-sorting">
                            <label for="sort">Sort By: </label>
                            <select class="normal-forms select-width" id="sort">
                                <option value="">Latest</option>
                                <option value="">Newest</option>
                                <option value="">Brand</option>
                            </select>
                        </div>
                        
                        <div class="filterable-result">
                             <button class="mobile-filter-btn" id="mobile-filter-btn">
                                <i class='bx bx-filter-alt'></i>Filter
                             </button>
                            <p><span>{{count($products)}}</span> Results Found</p>
                        </div>
                    </div>

                      @if(count($products)>0)
                    <div class="filter-product-show">
                        @forelse($products as $popular_product)
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
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header" style="border-bottom: none;">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
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
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                      @else
                          <p class="text-center">No Product Found</p>
                      @endif
                  </div>
               </div>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. shop-page-section -->

@endsection


@push('add-scripts')

<script src="{{ asset('public/frontend/assets/js/product-filter-mobile-sidebar.js') }}"></script>
<script src="{{ asset('public/frontend/assets/js/shop-page-filter-option.js') }}"></script>

<script>
    //**  Category List data  **//
    $(document).ready(function(){
        $('.category-list').on('click', function(){
            var status = $(this).attr("data-val");

            if( status == 0 ){
                $(this).addClass('list_active');
                $(this).attr("data-val", 1)
            }
            else{
                $(this).removeClass('list_active');
                $(this).attr("data-val", 0)
            }

            var ids = '';
            $('.category-list').each(function(){
                var status = $(this).attr("data-val");
                if( status == 1){
                    var id = $(this).attr("data-id");
                    ids += id + ",";
                }
                else{
                    ids += "";
                }
            })
            // console.log(ids)
        })


        //**  Rating-list-filter  **//
        $(".rating-input").on("change", function(){
            var ids = "";
            $(".rating-input").each(function(){
                if(this.checked){
                   var id = $(this).val();
                   ids += id + ",";
                }
            })
            // console.log(ids)
        })


        //**  Product Tag List data  **//
        $(".product-tag").on("click", function(){
            var status = $(this).attr("data-val");

            if( status == 0 ){
                $(this).addClass("tag_active");
                $(this).attr("data-val", 1)
            }
            else{
                $(this).removeClass("tag_active");
                $(this).attr("data-val", 0)
            }

            var ids = "";
            $(".product-tag").each(function(){
                var status = $(this).attr("data-val");

                if( status == 1 ){
                    var id = $(this).attr("data-id");
                    ids += id + ",";
                }
                else{
                    ids += "";
                }
            })
            // console.log(ids);
        })
    })
</script>


<script>
    // Price Range toggle bar
    const rangeInput  = document.querySelectorAll('.range-input input'),
    progress    = document.querySelector('.range-slider .slider-progress'),
    inputPrice  = document.querySelectorAll('.input-price input')

    let priceGap = 500;

    // This is for the range price input field
    rangeInput.forEach(input =>{
    input.addEventListener("input", (e)=>{
    let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value)

    if( maxVal - minVal < priceGap ){
        if( e.target.className === 'range-min' ){
            rangeInput[0].value = maxVal - priceGap;
        }
        else{
            rangeInput[1].value = minVal + priceGap;
        }
    }
    else{
        inputPrice[0].value = minVal;
        inputPrice[1].value = maxVal;
        progress.style.left = ( minVal / rangeInput[0].max ) * 100 + "%";
        progress.style.right = 100 - ( maxVal / rangeInput[1].max ) * 100 + "%";
        }
      })
    })

    // This is for the price input field
    inputPrice.forEach(input =>{
    input.addEventListener("input", (e)=>{
    let minVal = parseInt(inputPrice[0].value),
        maxVal = parseInt(inputPrice[1].value)

    if((maxVal - minVal >= priceGap) && maxVal <= 5000 ){
            if( e.target.className === 'min-price' ){
                rangeInput[0].value = minVal;
                progress.style.left = ( minVal / rangeInput[0].max ) * 100 + "%";
            }
            else{
                rangeInput[1].value = maxVal;
                progress.style.right = 100 - ( maxVal / rangeInput[1].max ) * 100 + "%";
            }
        }
      })
    })
</script>

@endpush