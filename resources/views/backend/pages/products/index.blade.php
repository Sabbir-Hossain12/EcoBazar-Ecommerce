@extends('backend.layout.master')

@push('backendCss')
    {{--    <meta name="csrf_token" content="{{ csrf_token() }}" />--}}

    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css">
    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
          rel="stylesheet" type="text/css">
<style>

    #productTable td:nth-child(2) {
        width: 50px; /* Adjust width as needed */
    }
</style>
@endpush

@section('contents')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Products</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{-- Table Starts--}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Products List</h4>
                        <a class="btn btn-primary" href="{{route('admin.product.create')}}" >
                            Add Product
                        </a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 w-100 dataTable no-footer dtr-inline" id="productTable">
                            <thead>
                            <tr>
                                <th >SL</th>
                                <th >Image</th>
                                <th >Product Name</th>
                                <th>SKU</th>
                                
                                <th>Available Stock</th>
                                <th>Sold Stock</th>
                                <th>Popular Status</th>
                                <th>Hot Status</th>
                                <th>Featured Status</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="productTable">

                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    {{--    Table Ends--}}
    
@endsection

@push('backendJs')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('public/backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script>

        $(document).ready(function () {


            var token = $("input[name='_token']").val();

            //Show Data through Datatable 
            let productTable = $('#productTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{route('admin.product-data')}}",
                // pageLength: 30,

                columnDefs: [
                    { width: '10%', targets: 2 }, // Setting the width for the "Product Name" column
                ],

                columns: [
                    {
                        data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false


                    },
                    {
                        data: 'productImage',

                    },
                    {
                        data: 'product_name',
                        width: '20%',

                    },  
                    {
                        data: 'sku',

                    }, 
                    
                    {
                        data: 'available_qty',
                        width: '5%'

                    },  {
                        data: 'sold_qty',
                        width: '5%'
                    },
                    {
                        data: 'isPopular',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'isHot',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'isFeatured',
                        orderable: false,
                        searchable: false,
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
            

            // Delete Products
            $(document).on('click', '#deleteProductBtn', function () {
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

                                url: "{{ url('admin/products') }}/" + id,
                                data: {
                                    '_token': token
                                },
                                success: function (res) {
                                    
                                    if (res.message=='success') {
                                        Swal.fire({
                                            title: "Deleted!",
                                            text: "Product has been deleted.",
                                            icon: "success"
                                        });

                                        productTable.ajax.reload();
                                    }
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

            // Change Product Status
            $(document).on('click', '#status', function () {
                let id = $(this).data('id');
                let status = $(this).data('status')
               
                $.ajax(
                    {
                        type: 'post',
                        url: "{{route('admin.product.status')}}",
                        data: {
                            '_token': token,
                            id: id,
                            status: status

                        },
                        success: function (res) {
                            productTable.ajax.reload();

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
            
            //Change  Featured Product Status 
            $(document).on('click', '#featuredStatus', function () {
                let id = $(this).data('id');
                let status = $(this).data('status')

                $.ajax(
                    {
                        type: 'post',
                        url: "{{route('admin.product.featuredStatus')}}",
                        data: {
                            '_token': token,
                            id: id,
                            featuredStatus: status

                        },
                        success: function (res) {
                            productTable.ajax.reload();

                            if (res.status == 1) {

                                swal.fire(
                                    {
                                        title: 'Featured Status Changed to Active',
                                        icon: 'success'
                                    })
                            } else {
                                swal.fire(
                                    {
                                        title: 'Featured Status Changed to Inactive',
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
            
            //Change  Hot Product Status 
            $(document).on('click', '#hotStatus', function () {
                let id = $(this).data('id');
                let status = $(this).data('status')

                $.ajax(
                    {
                        type: 'post',
                        url: "{{route('admin.product.hotStatus')}}",
                        data: {
                            '_token': token,
                            id: id,
                            hotStatus: status

                        },
                        success: function (res) {
                            productTable.ajax.reload();

                            if (res.status == 1) {

                                swal.fire(
                                    {
                                        title: 'Hot Status Changed to Active',
                                        icon: 'success'
                                    })
                            } else {
                                swal.fire(
                                    {
                                        title: 'Hot Status Changed to Inactive',
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

            //Change  Popular Product Status 
            $(document).on('click', '#popularStatus', function () {
                let id = $(this).data('id');
                let status = $(this).data('status')

                $.ajax(
                    {
                        type: 'post',
                        url: "{{route('admin.product.popularStatus')}}",
                        data: {
                            '_token': token,
                            id: id,
                            popularStatus: status

                        },
                        success: function (res) {
                            productTable.ajax.reload();

                            if (res.status == 1) {

                                swal.fire(
                                    {
                                        title: 'Popular Status Changed to Active',
                                        icon: 'success'
                                    })
                            } else {
                                swal.fire(
                                    {
                                        title: 'Popular Status Changed to Inactive',
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