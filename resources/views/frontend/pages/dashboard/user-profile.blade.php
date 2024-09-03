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
                                    User-Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="personal-form">
                        <h2>personal Details</h2>
    
                        <form action="">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form_label" for="last_name">First Name *</label>
                                        <input type="text" name="full_name" id="full_name" class="normal-forms" placeholder="Enter Your First Name" style="height: 52px;">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form_label"  for="last_name">Last Name *</label>
                                        <input type="text" name="last_name" id="last_name" class="normal-forms" placeholder="Enter Your Last Name" style="height: 52px;">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form_label"  for="Number">Phone Number </label>
                                        <input type="text" name="Number" id="Number" class="normal-forms" placeholder="Enter Your Number" style="height: 52px;">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form_label"  for="email">Email Address *</label>
                                        <input type="email" name="email" id="email" class="normal-forms" placeholder="Email" style="height: 52px;">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form_label"  for="last_name">Write Your Message</label>
                                <textarea name="message" class="normal-forms" style="height: 200px;" placeholder="Write Your Message"></textarea>
                            </div>

                            <button type="submit" class="review-btn">Save Settings</button>
                        </form>
                    </div>

                    <div class="shipping-form">
                        <h2>SHIPPING ADDRESS</h2>
    
                        <form action="">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form_label"  for="Flat">Flat / Plot</label>
                                        <input type="text" name="" id="Flat" class="normal-forms" placeholder="Company Name" style="height: 52px;">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form_label"  for="Address">Address *</label>
                                        <input type="text" name="address" id="Address" class="normal-forms" placeholder="Address" style="height: 52px;">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form_label"  for="zip_code">Zip Code *</label>
                                        <input type="text" name="zip_code" id="zip_code" class="normal-forms" placeholder="Zip-Code" style="height: 52px;">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form_label"  for="Country">Country *</label>
                                        <select class="normal-forms select-width" name="" id="Country" style="height: 52px;">
                                            <option value="" disabled selected>Select the Country</option>
                                            <option value="">Bangladesh</option>
                                            <option value="">India</option>
                                            <option value="">Russia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form_label"  for="City">City *</label>
                                        <select class="normal-forms select-width" name="" id="City" style="height: 52px;">
                                            <option value="" disabled selected>Select the City</option>
                                            <option value="">Dhaka</option>
                                            <option value="">Borishal</option>
                                            <option value="">Sylhet</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form_label"  for="Region">Region/State *</label>
                                        <select class="normal-forms select-width" name="" id="Region" style="height: 52px;">
                                            <option value="" disabled selected>Select the Region/State</option>
                                            <option value="">Dhaka</option>
                                            <option value="">Keranigonj</option>
                                            <option value="">Bongshal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="review-btn">Save Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  dashboard section end -->

@endsection


@push('add-scripts')

@endpush