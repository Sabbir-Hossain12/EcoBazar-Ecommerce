
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
    </script>
</body>
</html>

