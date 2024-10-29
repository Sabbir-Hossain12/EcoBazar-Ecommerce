 <!-- Meta Tags -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="author" content="Sabbir&Nazmul">
 
 
 @stack('seo')
 
 <link rel="icon" href="" type="image/x-icon">
 <link rel="shortcut icon" href="" type="image/x-icon">

 <!-- Meta Title -->
 <title>
    @stack('titles')
</title>

 <!-- Icons CDN Link -->
 <link rel="stylesheet" href="{{ asset('public/frontend/lib/box-icons/css/boxicons.min.css') }}">
 <link rel="stylesheet" href="{{ asset('public/frontend/lib/font-awesome/css/all.min.css') }}">
 
 <!-- Remix CSS File -->
 <link rel="stylesheet" href="{{ asset('public/frontend/lib/remix icons/remixicon.css') }}">

 <!-- Bootstrap CSS File -->
 <link rel="stylesheet" href="{{ asset('public/frontend/lib/bootstrap-5.3.0/css/bootstrap.min.css') }}">

 <!-- Owl Carousel CSS File -->
 <link rel="stylesheet" href="{{ asset('public/frontend/plugin/owl-carousel/css/owl.carousel.min.css') }}">
 <link rel="stylesheet" href="{{ asset('public/frontend/plugin/owl-carousel/css/owl.theme.default.min.css') }}">

 <!-- Main CSS File -->
{{-- <link rel="stylesheet" href="{{ url('/get-theme-color') }}">--}}
 <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/theme.css') }}">
 <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">
 
{{-- tostr.js--}}
{{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">--}}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  @stack('add-css')