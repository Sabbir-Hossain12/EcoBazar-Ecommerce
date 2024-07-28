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
                                    404 Error Page
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- start Page 404 section -->
    <section class="page-404-section">
        <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="page-404-details">
                     <img src="{{ asset('public/frontend/assets/images/404.png') }}" alt="">
                     <h1>Oops! page not found</h1>
                     <p>Ut consequat ac tortor eu vehicula. Aenean accumsan purus eros. Maecenas sagittis tortor at metus mollis</p>
                     <div class="text-center">
                        <button class="btn-404">Back To Home</button>
                     </div>
                  </div>
               </div>
            </div><!-- End. row -->
        </div><!-- End. container -->
    </section><!-- End. page-404-section -->

@endsection


@push('add-scripts')

@endpush