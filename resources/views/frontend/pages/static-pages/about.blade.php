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
                                    About
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- start About Us section -->
    <section class="about-section">
        <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="about-content">
                        <div class="about-content-image">
                            <img src="{{ asset('public/frontend/assets/images/about_images/about-Image-1.png') }}" alt="">
                        </div>

                        <div class="about-content-title">
                            <h1>100% Trusted Organic Food Store</h1>
                            <p>Morbi porttitor ligula in nunc varius sagittis. Proin dui nisi, laoreet ut tempor ac, cursus vitae eros. Cras quis ultricies elit. Proin ac lectus arcu. Maecenas aliquet vel tellus at accumsan. Donec a eros non massa vulputate ornare. Vivamus ornare commodo ante, at commodo felis congue vitae.</p>

                            <div class="">
                                
                            </div>
                        </div><!-- End. about-content-title -->
                  </div><!-- End. about-content -->

                    <div class="about-content">
                        <div class="about-content-title">
                            <h1>We Delivered, You Enjoy Your Order.</h1>
                            <p>Ut suscipit egestas suscipit. Sed posuere pellentesque nunc, ultrices consectetur velit dapibus eu. Mauris sollicitudin dignissim diam, ac mattis eros accumsan rhoncus. Curabitur auctor bibendum nunc eget elementum.</p>

                            <ul class="content-list">
                                <li>
                                    <i class='bx bx-check'></i> Sed in metus pellentesque.
                                </li>
                                <li>
                                    <i class='bx bx-check'></i> Fusce et ex commodo, aliquam nulla efficitur, tempus lorem.
                                </li>
                                <li>
                                    <i class='bx bx-check'></i> Maecenas ut nunc fringilla erat varius..
                                </li>
                            </ul>

                            <button class="about-btn">Shop Now <i class="fa-solid fa-arrow-right ms-2"></i></button>
                        </div><!-- End. about-content-title -->

                        <div class="about-content-image">
                            <img src="{{ asset('public/frontend/assets/images/about_images/about-Image-3.png') }}" alt="">
                        </div>
                    </div><!-- End. about-content -->

               </div><!-- End. col-lg-12 -->
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. about-section -->


    <!-- start About Team section -->
    <section class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                       <h1>Our Awesome Team</h1>
                       <p>Pellentesque a ante vulputate leo porttitor luctus sed eget eros. Nulla et rhoncus neque. Duis non diam eget est luctus tincidunt a a mi.</p>
                    </div>

                    <!-- <div class="team-container"> -->
                    <div class="owl-carousel owl-theme" id="teamSlider">
                       <div class="team-description">
                           <div class="team-img">
                              <img src="{{ asset('public/frontend/assets/images/team_images/team-1.png') }}" alt="">

                              <div class="social-media">
                                  <ul>
                                      <li>
                                          <a href="">
                                              <i class='bx bxl-facebook'></i>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="">
                                             <i class="fa-brands fa-x-twitter"></i>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="">
                                              <i class='bx bxl-pinterest-alt'></i>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="">
                                              <i class='bx bxl-instagram'></i>
                                          </a>
                                      </li>
                                  </ul>
                              </div><!-- End. social-media -->
                           </div><!-- End. team-img -->

                           <div class="team-details">
                               <h4>Jane Cooper</h4>
                               <p>Worker</p>
                           </div><!-- End. team-details -->
                       </div><!-- End. team-description -->

                        <div class="team-description">
                            <div class="team-img">
                            <img src="{{ asset('public/frontend/assets/images/team_images/team-2.png') }}" alt="">

                            <div class="social-media">
                                <ul>
                                    <li>
                                        <a href="">
                                            <i class='bx bxl-facebook'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa-brands fa-x-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class='bx bxl-pinterest-alt'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class='bx bxl-instagram'></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- End. social-media -->
                            </div><!-- End. team-img -->

                            <div class="team-details">
                                <h4>Cody Fisher</h4>
                                <p>Security Guard</p>
                            </div><!-- End. team-details -->
                        </div><!-- End. team-description -->

                        <div class="team-description">
                            <div class="team-img">
                            <img src="{{ asset('public/frontend/assets/images/team_images/team-3.png') }}" alt="">

                            <div class="social-media">
                                <ul>
                                    <li>
                                        <a href="">
                                            <i class='bx bxl-facebook'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa-brands fa-x-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class='bx bxl-pinterest-alt'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class='bx bxl-instagram'></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- End. social-media -->
                            </div><!-- End. team-img -->

                            <div class="team-details">
                                <h4>Robert Fox</h4>
                                <p>Senior Farmer Manager</p>
                            </div><!-- End. team-details -->
                        </div><!-- End. team-description -->

                        <div class="team-description">
                            <div class="team-img">
                               <img src="{{ asset('public/frontend/assets/images/team_images/team-1.png') }}" alt="">
 
                               <div class="social-media">
                                   <ul>
                                       <li>
                                           <a href="">
                                               <i class='bx bxl-facebook'></i>
                                           </a>
                                       </li>
                                       <li>
                                           <a href="">
                                              <i class="fa-brands fa-x-twitter"></i>
                                           </a>
                                       </li>
                                       <li>
                                           <a href="">
                                               <i class='bx bxl-pinterest-alt'></i>
                                           </a>
                                       </li>
                                       <li>
                                           <a href="">
                                               <i class='bx bxl-instagram'></i>
                                           </a>
                                       </li>
                                   </ul>
                               </div><!-- End. social-media -->
                            </div><!-- End. team-img -->
 
                            <div class="team-details">
                                <h4>Jane Cooper</h4>
                                <p>Worker</p>
                            </div><!-- End. team-details -->
                        </div><!-- End. team-description -->
 
                         <div class="team-description">
                             <div class="team-img">
                             <img src="{{ asset('public/frontend/assets/images/team_images/team-2.png') }}" alt="">
 
                             <div class="social-media">
                                 <ul>
                                     <li>
                                         <a href="">
                                             <i class='bx bxl-facebook'></i>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="">
                                             <i class="fa-brands fa-x-twitter"></i>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="">
                                             <i class='bx bxl-pinterest-alt'></i>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="">
                                             <i class='bx bxl-instagram'></i>
                                         </a>
                                     </li>
                                 </ul>
                             </div><!-- End. social-media -->
                             </div><!-- End. team-img -->
 
                             <div class="team-details">
                                 <h4>Cody Fisher</h4>
                                 <p>Security Guard</p>
                             </div><!-- End. team-details -->
                         </div><!-- End. team-description -->

                    </div><!-- End. teamSlider -->
                </div><!-- End. col-lg-12 -->
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. team-section -->


    <!-- Start Testimonial Section -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="testimonial-title">
                    <h1>Client Testimonial</h1>
                    <div class="verticle-line"></div>
                </div><!-- End. row -->

                <!-- <div class="col-lg-4"> -->
                <div class="owl-carousel owl-theme" id="testimonial">
                    <div class="testimonial-card item">
                        <i class='bx bxs-quote-alt-right'></i>
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-1.png') }}" alt="">
                                <div class="client-details">
                                    <h4>Robert Fox</h4>
                                    <p>Customer</p>
                                </div><!-- End. client-details -->
                            </div><!-- End. client-bio -->

                            <div class="client-review">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div><!-- End. client-review -->
                        </div><!-- End. our-client -->
                    </div><!-- End. testimonial-card -->

                    <div class="testimonial-card item">
                        <i class='bx bxs-quote-alt-right'></i>
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-2.png') }}" alt="">
                                <div class="client-details">
                                    <h4>Robert Fox</h4>
                                    <p>Customer</p>
                                </div><!-- End. client-details -->
                            </div><!-- End. client-bio -->

                            <div class="client-review">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div><!-- End. client-review -->
                        </div><!-- End. our-client -->
                    </div><!-- End. testimonial-card -->

                    <div class="testimonial-card item">
                        <i class='bx bxs-quote-alt-right'></i>
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-3.png') }}" alt="">
                                <div class="client-details">
                                    <h4>Robert Fox</h4>
                                    <p>Customer</p>
                                </div><!-- End. client-details -->
                            </div><!-- End. client-bio -->

                            <div class="client-review">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div><!-- End. client-review -->
                        </div><!-- End. our-client -->
                    </div><!-- End. testimonial-card -->

                    <div class="testimonial-card item">
                        <i class='bx bxs-quote-alt-right'></i>
                        <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna dictum, bibendum cursus velit sodales. Donec sed neque eget</p>

                        <div class="our-client">
                            <div class="client-bio">
                                <img src="{{ asset('public/frontend/assets/images/testimonial_section/user-3.png') }}" alt="">
                                <div class="client-details">
                                    <h4>Robert Fox</h4>
                                    <p>Customer</p>
                                </div><!-- End. client-details -->
                            </div><!-- End. client-bio -->

                            <div class="client-review">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div><!-- End. client-review -->
                        </div><!-- End. our-client -->
                    </div><!-- End. testimonial-card -->
                </div><!-- End. testimonial -->
                
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. testimonial-section -->


    <!-- Start Business Logo Section -->
    <section class="business-logo-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme" id="businessLogo">
                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/assets/images/business_logo/logo-1.png') }}" alt="">
                        </div>

                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/assets/images/business_logo/logo-2.png') }}" alt="">
                        </div>

                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/assets/images/business_logo/logo-3.png') }}" alt="">
                        </div>

                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/assets/images/business_logo/logo-4.png') }}" alt="">
                        </div>

                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/') }}assets/images/business_logo/logo-5.png" alt="">
                        </div>

                        <div class="company-logo-show">
                            <img src="{{ asset('public/frontend/assets/images/business_logo/logo-6.png') }}" alt="">
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>

@endsection


@push('add-scripts')

@endpush