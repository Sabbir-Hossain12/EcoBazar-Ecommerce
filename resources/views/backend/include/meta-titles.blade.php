<!doctype html>
<html lang="en">

<head>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <meta charset="utf-8"/>

    <title>
        {{ config('app.name') }} | @stack('title')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
   
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/backend/assets/images/favicon.ico')}}">

    <!-- preloader css -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/preloader.min.css')}}" type="text/css"/>

    <!-- Bootstrap Css -->
    <link href="{{asset('public/backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>

    <!-- Icons Css -->
    <link href="{{asset('public/backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    
    <!-- App Css-->
    <link href="{{asset('public/backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
    
     <!-- Font Awesome CDN File -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style CSS-->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/style.css') }}">

    @stack('backendCss')
</head>