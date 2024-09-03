
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta Titles include -->
    @include('frontend.include.meta-titles')

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
        @if (Session::has('message'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
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
                    items: 4
                },
                992: {
                    nav: true,
                    dots: false,
                    items: 4
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

