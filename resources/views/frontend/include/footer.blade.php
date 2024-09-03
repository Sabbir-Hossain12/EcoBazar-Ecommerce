    <!-- start footer section -->
    <footer>
        <div class="container">
            <div class="row widget">
                <div class="col-12 col-lg-3">
                    <div class="widget-about">
                        <img src="{{ asset($basic_info->light_logo) }}" style=" height: 60px" class="footer-logo" alt="Footer Logo">
                        <p>{{$basic_info->short_desc}}</p>
                        
                        <div class="widget_contacts">
                            <div class="widget_contacts_div">
                                <a href="mailto:hnazmul748@gmail.com">{{$basic_info->email}}</a>
                                <span>or</span>
                                <a href="tel:01868512081">{{$basic_info->phone_1}}</a>
                            </div><!-- End .widget_contacts_div -->
                        </div><!-- End .widget_contacts -->

                    </div><!-- End .widget about-widget -->
                </div>

                <div class="col-6 col-md-6 col-lg-2">
                    <div class="widget-container">
                        <h4 class="widget-title">My Account</h4>
                        <!-- End .widget-title -->
                        <ul class="widget-list">
                            <li>
                                <a href="">My Account</a>
                            </li>
                            <li>
                                <a href="">Order History</a>
                            </li>
                            <li>
                                <a href="">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="">Wishlist</a>
                            </li>
                        </ul>
                        <!-- End .widget-list -->
                    </div>
                    <!-- End .widget-container -->
                </div>

                <div class="col-6 col-md-6 col-lg-2">
                    <div class="widget-container">
                        <h4 class="widget-title">Helps</h4>
                        <!-- End .widget-title -->
                        <ul class="widget-list">
                            <li>
                                <a href="">Contact</a>
                            </li>
                            <li>
                                <a href="">Faqs</a>
                            </li>
                            <li>
                                <a href="">Terms & Condition</a>
                            </li>
                            <li>
                                <a href="">Privacy Policy</a>
                            </li>
                        </ul>
                        <!-- End .widget-list -->
                    </div>
                    <!-- End .widget-container -->
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                    <div class="widget-container">
                        <h4 class="widget-title">Proxy</h4>
                        <!-- End .widget-title -->
                        <ul class="widget-list">
                            <li>
                                <a href="">About</a>
                            </li>
                            <li>
                                <a href="">Shop</a>
                            </li>
                            <li>
                                <a href="">Product</a>
                            </li>
                            <li>
                                <a href="">
                                    Track Order
                                </a>
                            </li>
                        </ul>
                        <!-- End .widget-list -->
                    </div>
                    <!-- End .widget-container -->
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="widget-container">
                        <h4 class="widget-title">Social Links</h4>
                        <!-- End .widget-title -->
                        <ul class="social-link">
                            <li>
                            <a href="{{$basic_info->fb_link}}">    <i class="fa-brands fa-facebook-f social-active"></i></a>
                            </li>
                            <li>
                                <a href="{{$basic_info->x_link}}">      <i class="fa-brands fa-x-twitter"></i></a>
                            </li>
                            <li>
                                <a href="{{$basic_info->p_link}}">   <i class="fa-brands fa-pinterest-p"></i></a>
                            </li>
                            <li>
                                <a href="{{$basic_info->insta_link}}">   <i class="fa-brands fa-instagram"></i></a>
                            </li>
                        </ul>
                        <!-- End .social-link -->
                    </div>
                    <!-- End .widget-container -->
                </div>
            </div>
            <!-- End. row widget-->

            <div class="row">
                <div class="col-lg-12">
                <div class="footer_copyright">
                    <p> {{env('APP_NAME')}} eCommerce © 2024. All Rights Reserved</p>
                    <img src="{{ asset('public/frontend/assets/images/footer_image/Payment.png') }}" alt="">
                </div>
                </div><!-- End. col-lg-12 -->
            </div><!-- End. row --> 
        </div><!-- End. container --> 
    </footer><!-- End. footer --> 