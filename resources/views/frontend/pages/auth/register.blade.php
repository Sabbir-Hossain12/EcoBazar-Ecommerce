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
                                    <i class='bx bx-home'></i>  <i class='bx bx-chevron-right'></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span>Account</span>
                                    <i class='bx bx-chevron-right'></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Create Account
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- start Register section -->
    <section class="form-section">
        <div class="container">
            <div class="row">
                <div class="main-form-field">
                    <div class="form-field">
                        <h3>Create Account</h3>
                        <div class="mb-3">
                            <input type="email" name="email" class="normal-forms" placeholder="Email">
                        </div>

                        <div class="mb-3 password-form">
                            <input type="password" name="password" class="normal-forms" id="password-form" placeholder="Password">
                            <i class="ri-eye-line" id="password-icon"></i>
                        </div>

                        <div class="mb-3 password-form">
                            <input type="password" name="password" class="normal-forms" id="confirm-password-form" placeholder="Confirm Password">
                            <i class="ri-eye-line" id="confirm-password-icon"></i>
                        </div>

                        <div class="remember-form mb-3">
                            <input type="checkbox" name="remember" class="remember">
                            <span>Accept all terms & Conditions</span>
                        </div>

                        <button class="form-btn">Sign In</button>

                        <p>Already have account? <a href="">Login</a></p>
                    </div><!-- End. form-field -->
                </div><!-- End. main-form-field -->
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. form-section -->

@endsection


@push('add-scripts')

<script>
    // Password Form icon show-hide
    let password_icon = document.getElementById('password-icon');
    let confirm_password_icon = document.getElementById('confirm-password-icon');
    let password_form = document.getElementById('password-form');
    let confirm_password_form = document.getElementById('confirm-password-form');

    
    password_icon.addEventListener("click", function(){
        let type = password_form.getAttribute("type");

        if (type === "password") {
                password_form.setAttribute("type", "text");
            } else {
                password_form.setAttribute("type", "password");
            }
    });
    
    confirm_password_icon.addEventListener("click", function(){
        let types = confirm_password_form.getAttribute("type");

        if (types === "password") {
                confirm_password_form.setAttribute("type", "text");
            } else {
                confirm_password_form.setAttribute("type", "password");
            }
    });
</script>

@endpush