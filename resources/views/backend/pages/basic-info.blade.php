@extends('backend.layout.master')

@section('backendCss')
    <link href="{{asset('public/backend')}}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
          rel="stylesheet" type="text/css">

@endsection

@section('contents')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Basic Info</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Basic-info</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{--    Form Starts--}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Website Basic Information</h4>
                    {{--                    <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each--}}
                    {{--                        textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>--}}
                </div>
                <div class="card-body p-4">

                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label for="example-email-input" class="form-label">Email</label>
                                    <input class="form-control" type="email" placeholder="xyz@gmail.com"
                                           id="example-email-input">
                                </div>

                                <div class="mb-3">
                                    <label for="cservice_phone" class="form-label">Customer Service Phone</label>
                                    <input class="form-control" type="text" placeholder="Enter Store Phone Number"
                                           id="cservice_phone">
                                </div>
                                <div class="mb-3">
                                    <label for="cservice_phone" class="form-label">Facebook link</label>
                                    <input class="form-control" type="text" placeholder="Enter Store Phone Number"
                                           id="cservice_phone">
                                </div>
                                <div class="mb-3">
                                    <label for="cservice_phone" class="form-label">X link</label>
                                    <input class="form-control" type="text" placeholder="Enter Store Phone Number"
                                           id="cservice_phone">
                                </div>
                                <div class="mb-3">
                                    <label for="cservice_phone" class="form-label">Pinterest link</label>
                                    <input class="form-control" type="text" placeholder="Enter Store Phone Number"
                                           id="cservice_phone">
                                </div>


                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <label for="cservice_phone" class="form-label">Youtube Link</label>
                                    <input class="form-control" type="text" placeholder="Enter Store Phone Number"
                                           id="cservice_phone">
                                </div>
                                <div class="mb-3">
                                    <label for="cservice_phone" class="form-label">Instagram Link</label>
                                    <input class="form-control" type="text" placeholder="Enter Store Phone Number"
                                           id="cservice_phone">
                                </div>
                                <div class="mb-3">
                                    <label for="cservice_phone" class="form-label">Inside Dhaka Charge</label>
                                    <input class="form-control" type="number" placeholder="Enter Store Phone Number"
                                           id="cservice_phone">
                                </div>
                                <div class="mb-3">
                                    <label for="cservice_phone" class="form-label">Outside Dhaka Charge</label>
                                    <input class="form-control" type="number" placeholder="Enter Store Phone Number"
                                           id="cservice_phone">
                                </div>

                                <div class="mb-3">
                                    <label for="store_location" class="form-label">Store Location</label>
                                    <textarea id="store_location" class="form-control"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Pixel & Analytics</h4>
                    {{--                    <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each--}}
                    {{--                        textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>--}}
                </div>
                <div class="card-body p-4">

                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label for="store_location" class="form-label">Facebook Pixel</label>
                                    <textarea id="store_location" class="form-control"></textarea>
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label for="store_location" class="form-label">Chatbox Script</label>
                                    <textarea id="store_location" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <label for="store_location" class="form-label">Google Analytics</label>
                                    <textarea id="store_location" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="store_location" class="form-label">Marquee Text</label>
                                    <textarea id="store_location" class="form-control"></textarea>
                                </div>
                                
                              

                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4 d-grid">
                        <button class="btn  btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection

@section('backendJs')


@endsection