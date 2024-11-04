
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta Titles include -->
    @include('frontend.include.meta-titles')
    <style>
        :root{
            --theme-green: {{$themeColor->primary_color_value ?? '#00B207' }};
            --theme-white: #FFF;
            --theme-secondary-1: #e5e5e5;
            --theme-secondary-2: #e6e6e6;
            --theme-secondary-3: #f2f2f2;
            --theme-secondary-4: #d9d9d9;
            --theme-secondary-5: #f7f7f7;
            /*--theme-paragraph-1: #f7f7f7;*/
            --theme-paragraph-1: #808080;
            --theme-paragraph-2: #999;
            --theme-black: {{$themeColor->secondary_color_value ?? '#191919' }};
            --theme-lightWhite: #ccc;
            --theme-light-green: #2c742f;
            --theme-orange: #ff8a00;
            --theme-yellow: #FCC900;
            --theme-lime: #84d187;
            --theme-gray-1: #666;
            --theme-gray-2: #4d4d4d;
            --theme-gray-3: #333;
            --theme-sky-blue: #2388ff;
            --theme-campaign-color: #b9bab9;
            --theme-prd-price: #002603;
            --theme-prdCart-iconBg: #dae5da;
            --theme-ash: #b3b3b3;
            --theme-discount-bg: #fdeded;


            --btn-green: {{$themeColor->primary_color_value ?? '#00B207' }};
            --btn-white: #FFF;
            --btn-gray: #4d4d4d;
            --btn-gray-2: #333;
            --btn-secondary: #F2F2F2;


            --form-white: #FFF;
            --form-secondary: #E6E6E6;
            --form-black: #1A1A1A;
            --form-green: {{$themeColor->primary_color_value ?? '#00B207' }};


            --badge-white: #FFF;
            --badge-black: #1A1A1A;
            --badge-green: {{$themeColor->primary_color_value ?? '#00B207' }};


            --shadow-testimonial: 0px 10px 20px rgba(0,0,0,0.01);
            --shadow-advice-sec: 0px 16px 48px rgba(14,107,21,0.08);
            --shadow-blog-card-1: 0px 20px 50px rgba(0,0,0,0.08);
            --shadow-blog-card-2: 0px 4px 4px rgba(0,0,0,0.25);
            --shadow-product: 0px 0px 12px rgba(33,181,38,0.32);
            --shadow-login-register: 0px 0px 56px rgba(0,38,3,0.08);
            --shadow-secondary: 0px 8px 40px rgba(0,38,3,0.08);
            --shadow-cart-sidebar: 0px 12px 48px rgba(0,0,0,0.12);

            --shadow-header-sidebar: 2px 0px 8px 0 rgba(51,51,51,0.5);
            --shadow-subscription: 0px 4px 4px 0 rgba(0,0,0,0.25);
        }
    </style>
</head>
<body>

    <!-- Headers include -->
    @include('frontend.include.header')
   

        @yield('body-content')


    <!-- Footer include -->
    @include('frontend.include.footer')


    <!-- Script include -->
    @include('frontend.include.script')

    <script>
        @if (Session::has('success'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('success') }}");
        @endif

                @if (Session::has('error'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
        @endif

                @if (Session::has('info'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
        @endif

                @if (Session::has('warning'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
        @endif
        
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // multiple product slider section 
        $('#multi-product-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            navText: ['<i class="fa-solid fa-chevron-left"></i>', '<i class="fa-solid fa-chevron-right"></i>'],
            responsive: {
                0: {
                    nav: true,
                    dots: false,
                    items: 2
                },
                400: {
                    nav: true,
                    dots: false,
                    items: 3
                },
                577: {
                    nav: true,
                    dots: false,
                    items: 4
                },
                992: {
                    nav: true,
                    dots: false,
                    items: 4
                },
            }
        })


        // Related product slider section 
        $('#relatedSlider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            navText: ['<i class="fa-solid fa-chevron-left"></i>', '<i class="fa-solid fa-chevron-right"></i>'],
            responsive: {
                0: {
                    nav: true,
                    dots: false,
                    items: 2
                },
                577: {
                    nav: true,
                    dots: false,
                    items: 2
                },
                768: {
                    nav: true,
                    dots: false,
                    items: 5
                },
                992: {
                    nav: true,
                    dots: false,
                    items: 5
                },
            }
        })

        
        cartData();
        function cartData() {
            $.ajax(
                {
                    type: 'GET',
                    url: '{{route('cart-data')}}',
                    
                    success: function (res) {
                        $('#cartData').empty();
                        
                        Object.values(res.data).forEach(function (item, index) {
                            let sizeInfo = item.options.size ? `<p>Size: <span>${item.options.size}</span></p>` : '';
                            let colorInfo = item.options.color ? `<p>Color: <span>${item.options.color}</span></p>` : '';
                            let weightInfo = item.options.weight ? `<p>Weight: <span>${item.options.weight}</span></p>` : '';
                            
                            let content = `<div class="cart-item-details">
                    <div class="cart-item-description">
                        <img src=" ${item.options.image} " class="mr-4"  alt="">
                        <div class="cart-item-title">
                            <h2>${item.name}</h2>
                            <p>${item.qty} x <span>৳ ${item.price}</span></p>

                            ${sizeInfo}
                            ${colorInfo}
                            ${weightInfo}
                        </div>
                    <i class="fa-solid fa-x" onclick="removeCartItem('${item.rowId}')"></i>
                    </div>
                </div>`
                            $('#cartData').append(content);
                        })
                        
                        $('.cart-count').text(res.count)
                        $('#cart-subtotal').text('৳ '+ res.subTotal);


                    },
                    error: function (e) {

                        console.log(e)
                    }
                }
            )
        }


        function removeCartItem(rowId) {

           
            $.ajax(
                {
                    type: 'POST',
                    url: '{{route('remove-cart-item')}}',
                    data: {
                        rowId: rowId
                    },
                    success: function (res) {
                        cartData();
                        
                        swal.fire(
                            {
                                title: 'success!',
                                text: 'Item removed from cart',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            }
                        )
                    },
                    error: function (e) {
                        console.log(e)
                    }
                }
            )
        }
  
    </script>
</body>
</html>

