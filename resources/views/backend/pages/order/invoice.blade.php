
@extends('backend.layout.master')

@push('backendCss')
    {{--    <meta name="csrf_token" content="{{ csrf_token() }}" />--}}

    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css">
    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
          rel="stylesheet" type="text/css">

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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                        <li class="breadcrumb-item active">Invoice Detail</li>
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
                                    <img src="assets/images/logo-sm.svg" alt="" height="24"><span class="logo-txt">Minia</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="mb-4">
                                    <h4 class="float-end font-size-16">Invoice # 12345</h4>
                                </div>
                            </div>
                        </div>


                        <p class="mb-1">1874 County Line Road City, FL 33566</p>
                        <p class="mb-1"><i class="mdi mdi-email align-middle me-1"></i> abc@123.com</p>
                        <p><i class="mdi mdi-phone align-middle me-1"></i> 012-345-6789</p>
                    </div>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <h5 class="font-size-15 mb-3">Billed To:</h5>
                                <h5 class="font-size-14 mb-2">Richard Saul</h5>
                                <p class="mb-1">1208 Sherwood Circle
                                    Lafayette, LA 70506</p>
                                <p class="mb-1">RichardSaul@rhyta.com</p>
                                <p>337-256-9134</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <div>
                                    <h5 class="font-size-15">Order Date:</h5>
                                    <p>February 16, 2020</p>
                                </div>

                                <div class="mt-4">
                                    <h5 class="font-size-15">Payment Method:</h5>
                                    <p class="mb-1">Visa ending **** 4242</p>
                                    <p>richards@email.com</p>
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
                                <tr>
                                    <th scope="row">01</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">Minia</h5>
                                        <p class="font-size-13 text-muted mb-0">Bootstrap 5 Admin Dashboard </p>
                                    </td>
                                    <td class="text-end">$499.00</td>
                                </tr>

                                <tr>
                                    <th scope="row">02</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">Skote</h5>
                                        <p class="font-size-13 text-muted mb-0">Bootstrap 5 Admin Dashboard </p>
                                    </td>
                                    <td class="text-end">$499.00</td>
                                </tr>

                                <tr>
                                    <th scope="row" colspan="2" class="text-end">Sub Total</th>
                                    <td class="text-end">$998.00</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="border-0 text-end">
                                        Tax</th>
                                    <td class="border-0 text-end">$12.00</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="border-0 text-end">Total</th>
                                    <td class="border-0 text-end"><h4 class="m-0">$1010.00</h4></td>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('public/backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script>

        $(document).ready(function () {


            var token = $("input[name='_token']").val();

            //Show Data through Datatable 
            let adminTable = $('#adminTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                {{--ajax: "{{url('/admin/data')}}",--}}
                ajax: "{{route('admin.data')}}",
                // pageLength: 30,

                columns: [
                    {
                        data: 'id',


                    },
                    {
                        data: 'name',

                    },
                    {
                        data: 'email',

                    },
                    {
                        data: 'status',
                        name: 'Status',
                        orderable: false,
                        searchable: false,
                    },

                    {
                        data: 'action',
                        name: 'Actions',
                        orderable: false,
                        searchable: false
                    },

                ]
            });


            // Create Admin
            $('#createAdmin').submit(function (e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.admins.store') }}",
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        if (res.message === 'success') {
                            $('#createAdminModal').modal('hide');
                            $('#createAdmin')[0].reset();
                            adminTable.ajax.reload()
                            swal.fire({
                                title: "Success",
                                text: "Admin Created !",
                                icon: "success"
                            })


                        }
                    },
                    error: function (err) {
                        console.error('Error:', err);
                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                        // Optionally, handle error behavior like showing an error message
                    }
                });
            });

            // Read Admin Data
            $(document).on('click', '.editButton', function () {
                let id = $(this).data('id');
                $('#id').val(id);

                $.ajax(
                    {
                        type: "GET",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('admin/admins') }}/" + id + "/edit",
                        data: {
                            id: id
                        },

                        processData: false,  // Prevent jQuery from processing the data
                        contentType: false,  // Prevent jQuery from setting contentType
                        success: function (res) {

                            console.log('success')
                            $('#eName').val(res.data.name);
                            $('#eEmail').val(res.data.email);
                            $('#ePhone').val(res.data.phone);
                            $('#eType').val(res.data.type);


                        },
                        error: function (err) {
                            console.log('failed')
                        }
                    }
                )
            })

            // Edit Admin Data
            $('#editAdmin').submit(function (e) {
                e.preventDefault();
                let id = $('#id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/admins') }}/" + id,
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        if (res.message === 'success') {
                            $('#editAdminModal').modal('hide');
                            $('#editAdmin')[0].reset();
                            adminTable.ajax.reload()
                            swal.fire({
                                title: "Success",
                                text: "Admin Edited !",
                                icon: "success"
                            })


                        }
                    },
                    error: function (err) {
                        console.error('Error:', err);
                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                        // Optionally, handle error behavior like showing an error message
                    }
                });
            });


            // Delete Admin
            $(document).on('click', '#deleteAdminBtn', function () {
                let id = $(this).data('id');

                swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                })
                    .then((result) => {
                        if (result.isConfirmed) {


                            $.ajax({
                                type: 'DELETE',

                                url: "{{ url('admin/admins') }}/" + id,
                                data: {
                                    '_token': token
                                },
                                success: function (res) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Admin has been deleted.",
                                        icon: "success"
                                    });

                                    adminTable.ajax.reload();
                                },
                                error: function (err) {
                                    console.log('error')
                                }
                            })


                        } else {
                            swal.fire('Your Data is Safe');
                        }

                    })


            })

            // Change Admin Status
            $(document).on('click', '#adminStatus', function () {
                let id = $(this).data('id');
                let status = $(this).data('status')
                console.log(id + status)
                $.ajax(
                    {
                        type: 'post',
                        url: "{{route('admin.status')}}",
                        data: {
                            '_token': token,
                            id: id,
                            status: status

                        },
                        success: function (res) {
                            adminTable.ajax.reload();

                            if (res.status == 1) {

                                swal.fire(
                                    {
                                        title: 'Status Changed to Active',
                                        icon: 'success'
                                    })
                            } else {
                                swal.fire(
                                    {
                                        title: 'Status Changed to Inactive',
                                        icon: 'success'
                                    })

                            }
                        },
                        error: function (err) {
                            console.log(err)
                        }
                    }
                )
            })
        });
    </script>

@endpush