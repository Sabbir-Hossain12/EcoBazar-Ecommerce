@extends('frontend.layout.master')

@push('titles')
    EcoBazaar - Bootstrap eCommerce Template
@endpush

@push('add-css')
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/custom.css') }}">
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
                                    <i class='bx bx-home'></i>  <i class='bx bx-chevron-right'></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    User-Dashboard
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space user-dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="profile-top">
                            <div class="profile-image">
                                <img src="{{ asset('public/frontend/assets/images/all-icons/avtar.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="profile-detail">
                                <h5>{{Auth::user()->name ?? ''}}</h5>
                                <h6>{{Auth::user()->email ?? ''}}</h6>
                            </div>
                        </div>

                        <div class="faq-tab">
                            <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#info"
                                        class="nav-link active">Account Info</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#address"
                                        class="nav-link">Address Book</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#orders"
                                        class="nav-link">My Orders</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#wishlist"
                                        class="nav-link">My Wishlist</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#payment"
                                        class="nav-link">Saved Cards</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#profile"
                                        class="nav-link">Profile</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#security"
                                        class="nav-link">Security</a> </li>
                                <li class="nav-item"><a href="" class="nav-link">Log Out</a> </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-lg-9">
                    <div class="faq-content tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="info">
                            <div class="counter-section">
                                <div class="welcome-msg">
                                    <h4>Hello, {{Auth::user()->name ?? ''}} !</h4>
                                    <p>From your My Account Dashboard you have the ability to view a snapshot of your
                                        recent
                                        account activity and update your account information. Select a link below to
                                        view or
                                        edit information.</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('public/frontend/assets/images/all-icons/sale.png') }}" class="img-fluid">
                                            <div>
                                                <h3>25</h3>
                                                <h5>Total Order</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('public/frontend/assets/images/all-icons/homework.png') }}" class="img-fluid">
                                            <div>
                                                <h3>5</h3>
                                                <h5>Pending Orders</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('public/frontend/assets/images/all-icons/order.png') }}" class="img-fluid">
                                            <div>
                                                <h3>50</h3>
                                                <h5>Wishlist</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-account box-info">
                                    <div class="box-head">
                                        <h4>Account Information</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3>Contact Information</h3><a href="#">Edit</a>
                                                </div>
                                                <div class="box-content">
                                                    <h6>Mark Jecno</h6>
                                                    <h6>mark-jecno@gmail.com</h6>
                                                    <h6><a href="#">Change Password</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3>Newsletters</h3><a href="#">Edit</a>
                                                </div>
                                                <div class="box-content">
                                                    <p>You are currently not subscribed to any newsletter.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box mt-3">
                                        <div class="box-title">
                                            <h3>Address Book</h3><a href="#">Manage Addresses</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6>Default Billing Address</h6>
                                                <address>You have not set a default billing address.<br><a href="#">Edit
                                                        Address</a></address>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6>Default Shipping Address</h6>
                                                <address>You have not set a default shipping address.<br><a
                                                        href="#">Edit Address</a></address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="address">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>Address Book</h3>
                                                <a href="#" class="btn btn-sm btn-solid">+ add new</a>
                                            </div>
                                            <div class="address-book-section">
                                                <div class="row g-4">
                                                    <div class="select-box active col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="top">
                                                                <h6>mark jecno <span>home</span></h6>
                                                            </div>
                                                            <div class="middle">
                                                                <div class="address">
                                                                    <p>549 Sulphur Springs Road</p>
                                                                    <p>Downers Grove, IL</p>
                                                                    <p>60515</p>
                                                                </div>
                                                                <div class="number">
                                                                    <p>mobile: <span>+91 123 - 456 - 7890</span></p>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#edit-address"
                                                                    data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="select-box col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="top">
                                                                <h6>mark jecno <span>office</span></h6>
                                                            </div>
                                                            <div class="middle">
                                                                <div class="address">
                                                                    <p>549 Sulphur Springs Road</p>
                                                                    <p>Downers Grove, IL</p>
                                                                    <p>60515</p>
                                                                </div>
                                                                <div class="number">
                                                                    <p>mobile: <span>+91 123 - 456 - 7890</span></p>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#edit-address"
                                                                    data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="orders">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>My Orders</h3>
                                            </div>
                                            
                                            <div class="table-responsive-lg">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr class="table-head">
                                                            <th scope="col">image</th>
                                                            <th scope="col">Order Id</th>
                                                            <th scope="col">Product Details</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ asset('public/frontend/assets/images/all-icons/28.jpg') }}"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <p>#125367</p>
                                                            </td>
                                                            <td>
                                                                <p class="fs-6">Sleevless white top</p>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge rounded-pill bg-danger custom-badge">Pending</span>
                                                            </td>
                                                            <td>
                                                                <p class="theme-color fs-6">$49.54</p>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <i class="fa fa-eye text-theme"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ asset('public/frontend/assets/images/all-icons/28.jpg') }}"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <p>#127569</p>
                                                            </td>
                                                            <td>
                                                                <p class="fs-6">Candy red solid tshirt</p>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge rounded-pill bg-success custom-badge">Shipped</span>
                                                            </td>
                                                            <td>
                                                                <p class="theme-color fs-6">$49.54</p>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <i class="fa fa-eye text-theme"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ asset('public/frontend/assets/images/all-icons/28.jpg') }}" class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <p>#125753</p>
                                                            </td>
                                                            <td>
                                                                <p class="fs-6">multicolored polo tshirt</p>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge rounded-pill bg-secondary custom-badge">Canceled</span>
                                                            </td>
                                                            <td>
                                                                <p class="theme-color fs-6">$49.54</p>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <i class="fa fa-eye text-theme"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="wishlist">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>My Wishlist</h3>
                                            </div>
                                            <div class="table-responsive-md">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr class="table-head">
                                                            <th scope="col">image</th>
                                                            <th scope="col">Order Id</th>
                                                            <th scope="col">Product Details</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ asset('public/frontend/assets/images/all-icons/28.jpg') }}"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <p class="mt-0">#125021</p>
                                                            </td>
                                                            <td>
                                                                <p>Purple polo tshirt</p>
                                                            </td>
                                                            <td>
                                                                <p class="theme-color fs-6">$49.54</p>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ asset('public/frontend/assets/images/all-icons/28.jpg') }}"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <p class="mt-0">#125367</p>
                                                            </td>
                                                            <td>
                                                                <p>Sleevless white top</p>
                                                            </td>
                                                            <td>
                                                                <p class="theme-color fs-6">$49.54</p>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ asset('public/frontend/assets/images/all-icons/28.jpg') }}"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <p>#125948</p>
                                                            </td>
                                                            <td>
                                                                <p>multi color polo tshirt</p>
                                                            </td>
                                                            <td>
                                                                <p class="theme-color fs-6">$49.54</p>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ asset('public/frontend/assets/images/all-icons/28.jpg') }}"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <p>#127569</p>
                                                            </td>
                                                            <td>
                                                                <p>Candy red solid tshirt</p>
                                                            </td>
                                                            <td>
                                                                <p class="theme-color fs-6">$49.54</p>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ asset('public/frontend/assets/images/all-icons/28.jpg') }}"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <p>#125753</p>
                                                            </td>
                                                            <td>
                                                                <p>multicolored polo tshirt</p>
                                                            </td>
                                                            <td>
                                                                <p class="theme-color fs-6">$49.54</p>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ asset('public/frontend/assets/images/all-icons/28.jpg') }}"
                                                                        class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <p>#125021</p>
                                                            </td>
                                                            <td>
                                                                <p>Men's Sweatshirt</p>
                                                            </td>
                                                            <td>
                                                                <p class="theme-color fs-6">$49.54</p>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="payment">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>Saved Cards</h3>
                                                <a href="#" class="btn btn-sm btn-solid">+ add new</a>
                                            </div>
                                            <div class="address-book-section">
                                                <div class="row g-4">
                                                    <div class="select-box active col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="bank-logo">
                                                                <img src="{{ asset('public/frontend/assets/images/all-icons/bank-logo.png') }}"
                                                                    class="bank-logo">
                                                                <img src="{{ asset('public/frontend/assets/images/all-icons/visa.png') }}"
                                                                    class="network-logo">
                                                            </div>
                                                            <div class="card-number">
                                                                <h6>Card Number</h6>
                                                                <h5>6262 6126 2112 1515</h5>
                                                            </div>
                                                            <div class="name-validity">
                                                                <div class="left">
                                                                    <h6>name on card</h6>
                                                                    <h5>Mark Jecno</h5>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>validity</h6>
                                                                    <h5>XX/XX</h5>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#edit-address"
                                                                    data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="select-box col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="bank-logo">
                                                                <img src="{{ asset('public/frontend/assets/images/all-icons/bank-logo1.png') }}"
                                                                    class="bank-logo">
                                                                <img src="{{ asset('public/frontend/assets/images/all-icons/visa.png') }}"
                                                                    class="network-logo">
                                                            </div>
                                                            <div class="card-number">
                                                                <h6>Card Number</h6>
                                                                <h5>6262 6126 2112 1515</h5>
                                                            </div>
                                                            <div class="name-validity">
                                                                <div class="left">
                                                                    <h6>name on card</h6>
                                                                    <h5>Mark Jecno</h5>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>validity</h6>
                                                                    <h5>XX/XX</h5>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#edit-address"
                                                                    data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>profile</h4>
                                                    <a class="edit-link" href="#">edit</a>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <ul>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>company name</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>Fashion Store</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>email address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>mark.jecno@gmail.com</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Country / Region</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>Downers Grove, IL</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Year Established</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>2018</h6>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Total Employees</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>101 - 200 People</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>category</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>clothing</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>street address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>549 Sulphur Springs Road</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>city/state</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>Downers Grove, IL</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>zip</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>60515</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dashboard-title mt-lg-5 mt-3">
                                                    <h4>login details</h4>
                                                    <a class="edit-link" href="#">edit</a>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <ul>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Email Address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>mark.jecno@gmail.com <a class="edit-link"
                                                                            href="#">edit</a></h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Phone No.</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>+01 4485 5454<a class="edit-link"
                                                                            href="#">Edit</a></h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Password</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>******* <a class="edit-link" href="#">Edit</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="security">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>settings</h4>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <div class="account-setting">
                                                        <h5>Notifications</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios1" value="option1" checked>
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios1">
                                                                        Allow Desktop Notifications
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios2" value="option2">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios2">
                                                                        Enable Notifications
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios3" value="option3">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios3">
                                                                        Get notification for my own activity
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios4" value="option4">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios4">
                                                                        DND
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="account-setting">
                                                        <h5>deactivate account</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios1"
                                                                        id="exampleRadios4" value="option4" checked>
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios4">
                                                                        I have a privacy concern
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios1"
                                                                        id="exampleRadios5" value="option5">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios5">
                                                                        This is temporary
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios1"
                                                                        id="exampleRadios6" value="option6">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios6">
                                                                        other
                                                                    </label>
                                                                </div>
                                                                <button type="button"
                                                                    class="btn btn-solid btn-xs">Deactivate
                                                                    Account</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="account-setting">
                                                        <h5>Delete account</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios3"
                                                                        id="exampleRadios7" value="option7" checked>
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios7">
                                                                        No longer usable
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios3"
                                                                        id="exampleRadios8" value="option8">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios8">
                                                                        Want to switch on other account
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios3"
                                                                        id="exampleRadios9" value="option9">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios9">
                                                                        other
                                                                    </label>
                                                                </div>
                                                                <button type="button"
                                                                    class="btn btn-solid btn-xs">Delete Account</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  dashboard section end -->

@endsection


@push('add-scripts')

@endpush