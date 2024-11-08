
@extends('backend.layout.master')

@push('backendCss')


@endpush

@section('contents')



<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Invoice Detail</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <div class="mb-4">
                                    <img src="{{asset($basic_info->light_logo)}}" alt="" height="24"><span class="logo-txt">{{$basic_info->website_name}}</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="mb-4">
                                    <h4 class="float-end font-size-16">Invoice # {{$order->invoiceID}}</h4>
                                </div>
                            </div>
                        </div>


                        <p class="mb-1">{{$basic_info->store_location ?? 'Dhaka,Bangladesh'}}</p>
                        <p class="mb-1"><i class="mdi mdi-email align-middle me-1"></i> {{$basic_info->email ?? 'xyz@genzilla.com'}}</p>
                        <p><i class="mdi mdi-phone align-middle me-1"></i> {{$basic_info->phone_1}}</p>
                    </div>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <h5 class="font-size-15 mb-3">Billed To:</h5>
                                <h5 class="font-size-14 mb-2">{{$order->customer->first_name . $order->customer->last_name}}</h5>
                                <p class="mb-1">{{$order->customer->address_1,$order->customer->address_2,$order->customer->state_district,$order->customer->zip}}</p>
                                <p class="mb-1">{{$order->customer->email}}</p>
                                <p>{{$order->customer->phone}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <div>
                                    <h5 class="font-size-15">Order Date:</h5>
                                    <p>{{$order->created_at->format('d M Y')}}</p>
                                </div>

                                <div class="mt-4">
                                    <h5 class="font-size-15">Payment Method:</h5>
                                    <p class="mb-1">{{$order->payment_method}}</p>
{{--                                    <p>richards@email.com</p>--}}
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15">Payment Status:</h5>
                                    <p class="mb-1">{{$order->payment_status}}</p>
                                    {{--                                    <p>richards@email.com</p>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="py-2 mt-3">
                        <h5 class="font-size-15">Order summary</h5>
                    </div>
                    <div class="p-4 border rounded">
                        <div class="table-responsive">
                            <table class="table table-nowrap align-middle mb-0">
                                <thead>
                                <tr>
                                    <th style="width: 70px;">No.</th>
                                    <th>Item</th>
                                    <th class="text-end" style="width: 120px;">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($order->orderProducts as $product) 
                                <tr>
                                    <th scope="row">01</th>
                                    <td>
                                        <h4 class="font-size-14 mb-1">#{{$product->product_SKU}} {{$product->product_name}} X {{$product->quantity}}</h4>
                                        <p class="font-size-13 text-muted mb-0">Variant: 
                                            <span class="text-primary">
                                            {{isset($product->size)?  $product->size : ''}}
                                            {{isset($product->color)?  $product->color : ''}}
                                            {{isset($product->weight)? $product->weight : ''}}
                                            </span>
                                        </p>
                                    </td>
                                    <td class="text-end">{{$basic_info->currency_symbol}}{{$product->total}}</td>
                                </tr>
                                    @empty
                                @endforelse
                                

                                <tr>
                                    <th scope="row" colspan="2" class="text-end">Sub Total</th>
                                    <td class="text-end">{{$basic_info->currency_symbol}}{{$order->subtotal}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="border-0 text-end">
                                        Shipping Charge</th>
                                    <td class="border-0 text-end">{{$basic_info->currency_symbol}}{{$order->shipping_charge}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="border-0 text-end">Total</th>
                                    <td class="border-0 text-end"><h4 class="m-0">{{$basic_info->currency_symbol}}{{$order->total}}</h4></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-print-none mt-3">
                        <div class="float-end">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                            <a href="#" class="btn btn-primary w-md waves-effect waves-light">Send</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>


@endsection

@push('backendJs')



@endpush