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
                                <a href="javascript:;">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- start Contact Us section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="contact-container">
                        <div class="contact-details">
                            <img src="{{ asset('public/frontend/assets/images/all-icons/placeholder.png') }}" alt="">
                            <p>2715 Ash Dr. San Jose, South Dakota 83475</p>
                        </div><!-- End. contact-details -->
    
                        <div class="contact-details">
                            <img src="{{ asset('public/frontend/assets/images/all-icons/envelope.png') }}" alt="">
                            <p>Proxy@gmail.com</p>
                            <p>Help.proxy@gmail.com</p>
                        </div><!-- End. contact-details -->
    
                        <div class="contact-details">
                            <img src="{{ asset('public/frontend/assets/images/all-icons/phone-call.png') }}" alt="">
                            <p>(219) 555-0114</p>
                            <p>(164) 333-0487</p>
                        </div><!-- End. contact-details -->
                    </div><!-- End. contact-container -->
    
                    <div class="contact-form">
                        <h1>Just Say Hello!</h1>
                        <p>Do you fancy saying hi to me or you want to get started with your project and you need my help? Feel free to contact me.</p>
    
                        <form action="">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <input type="text" name="fullName" class="normal-forms" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <input type="email" name="email" class="normal-forms" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="text" name="subject" class="normal-forms" placeholder="Subject">
                            </div>

                            <div class="mb-3">
                                <textarea name="message" class="normal-forms" style="height: 100px;" placeholder="Message"></textarea>
                            </div>

                            <button type="submit" class="review-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. contact-section -->


    <!--- Google Map -->
    <section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.0750638653626!2d90.40630839765073!3d23.815929653062305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c6feb6c1b7b1%3A0x76350c55ebc50c34!2sRadisson%20Blu%20Water%20Garden%20Hotel%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1718379762510!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

@endsection


@push('add-scripts')

@endpush