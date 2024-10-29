    <!-- JQuery File -->
    <script src="{{ asset('public/frontend/plugin/jquery/jquery.min.js') }}"></script>

    <!-- Owl Carousel JS File -->
    <script src="{{ asset('public/frontend/plugin/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Bootstrap JS File -->
    <script src="{{ asset('public/frontend/lib/bootstrap-5.3.0/js/bootstrap.bundle.min.js') }}"></script>

{{--    <script src="{{ asset('public/frontend/assets/js/subscription.js') }}"></script>--}}

    <!-- Main JS File -->
    <script src="{{ asset('public/frontend/assets/js/main.js') }}"></script>

    <script src="{{asset('https://cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>

{{--toastr.js--}}
{{--    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {!! Toastr::message() !!}
    

    {{-- Laravel Share--}}
    <script src="{{ asset('js/share.js') }}"></script>

    @stack('add-scripts')