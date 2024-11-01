@extends('frontend.layout.master')

@push('titles')
    EcoBazaar - Bootstrap eCommerce Template
@endpush

@push('add-css')

@endpush

@section('body-content')




    <!-- start SignIn section -->
    <section class="form-section">
        <div class="container">
            <div class="row">
                <div class="main-form-field">
                    <div class="form-field">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h3>Sign In</h3>
                            <div class="mb-3">
                                <input type="email" name="email" value="{{old('email')}}" class="normal-forms" placeholder="Email">
                            </div>

                            <div class="mb-3 password-form">
                                <input type="password" name="password"  class="normal-forms" id="password-form"
                                       placeholder="Password">
                                <i class="ri-eye-line" id="password-icon"></i>
                            </div>

                            <div class="credential-form">
                                <div class="remember-form">
                                    <input type="checkbox" name="remember" class="remember">
                                    <span>Remember me</span>
                                </div>

                                <a href="">Forget Password</a>
                            </div>

                            <button type="submit" class="form-btn">Sign In</button>

                            <p>Or Sign In using </p>
                        </form>
                        
                        <div class="social-icon d-flex justify-content-center align-items-center gap-4 m-4 display-6">
                        <div class="form-details">
                            <a> <i class="fa-brands fa-facebook"></i> </a>
                        </div>
                        <div class="form-details">
                          <a href="{{route('github.login')}}">  <i class="fa-brands fa-github"></i></a>
                        </div>

                        <div class="form-details">
                          <a href="{{route('google.login')}}">  <i class="fa-brands fa-google"></i></a>
                        </div>

                        </div>
                        <p>Don’t have account? <a href="{{route('register')}}">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('add-scripts')

    <script>
        // Password Form icon show-hide
        let password_icon = document.getElementById('password-icon');
        let password_form = document.getElementById('password-form');

        password_icon.addEventListener("click", function () {
            let type = password_form.getAttribute("type");

            if (type === "password") {
                password_form.setAttribute("type", "text");
            } else {
                password_form.setAttribute("type", "password");
            }
        });
    </script>

@endpush