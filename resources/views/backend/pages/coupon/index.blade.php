

@extends('backend.layout.master')


@push('title')
    Create Coupon
@endpush


@push('backendCss')

    <link href="{{ asset('public/backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <link href="{{ asset('public/backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

@endpush


@section('contents')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Coupon</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Coupon</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Content part Start -->

    <div class="card">

        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">Coupons List</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">
                    Create Coupon
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0" id="couponTable">

                    <thead>
                    <tr>
                        <th>#SL.</th>
                        <th>Coupon Name</th>
                        <th>Coupon Code</th>
                        <th>Coupon Discount</th>
                        <th>Coupon Quantity</th>
                        <th>Coupon Expire Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Create Modal -->
        <div id="create_Modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add New Coupon</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        {{-- method="POST" action="{{ route('admin.category.store') }}" --}}
                        <form id="createForm" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" id="code">Coupon Name</label>
                                <input class="form-control" id="coupon_name" type="text" name="coupon_name" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label" id="code">Coupon Code</label>
                                <input class="form-control" id="code" type="text" name="code" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" id="discount">Coupon Discount (%)</label>
                                <input class="form-control" id="discount" type="number" min="1" name="discount" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" id="discount">Quantity (Overall)</label>
                                <input class="form-control" id="quantity" type="number" min="1" name="quantity" required>
                            </div>
                            <div class="mb-3">
                                <label for="max_used" class="form-label" id="discount">User Max Use Limit</label>
                                <input class="form-control" id="max_used" type="number" min="1" name="max_used" required>
                            </div>

                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" name="start_date" id="start_date" value="{{today()->format('Y-m-d')}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="expire_date" class="form-label">Expire Date</label>
                                <input type="date" class="form-control" name="expire_date" id="expire_date" required>
                            </div>
                            
                            <div class="d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-secondary waves-effect me-3"
                                  data-bs-dismiss="modal">Close </button>

                                <button type="submit" id="btn-store" class="btn btn-primary waves-effect waves-light"> Save changes </button>
                            </div>
                        </form>
                    </div>


                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


        <!-- Edit Modal -->
        <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Update SubCategory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        {{-- method="POST" action="{{ route('admin.category.store') }}" --}}
                        <form id="EditCoupon" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <input type="text" name="id" id="id" hidden>

                            <div class="mb-3">
                                <label class="form-label" id="code">Coupon Name</label>
                                <input class="form-control" id="coupon_name" type="text" name="coupon_name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="code">Coupon Code</label>
                                <input class="form-control" id="up_code" type="text" name="code" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="discount">Coupon Discount (%)</label>
                                <input class="form-control" id="up_discount" type="text" name="discount" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" id="discount">Quantity (Overall)</label>
                                <input class="form-control" id="quantity" type="number" min="1" name="quantity" required>
                            </div>
                            <div class="mb-3">
                                <label for="max_used" class="form-label" id="discount">User Max Use Limit</label>
                                <input class="form-control" id="max_used" type="number" min="1" name="max_used" required>
                            </div>

                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" name="start_date" id="start_date" value="{{today()}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="expire_date" class="form-label">Expire Date</label>
                                <input type="date" class="form-control" name="expire_date" id="up_expire_date" required>
                            </div>

                           

                            <div class="d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-secondary waves-effect me-3"
                                        data-bs-dismiss="modal">Close
                                </button>

                                <button type="submit" id="btn-store" class="btn btn-primary waves-effect waves-light">
                                    Save changes
                                </button>
                            </div>
                        </form>
                    </div>


                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>

@endsection

@push('backendJs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('public/backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script>

        $(document).ready(function () {

            // Show Data through Datatable
            let couponTables = $('#couponTable').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,

                ajax: "{{ route('admin.coupon-data') }}",
                // pageLength: 30,

                columns: [
                    {
                        data: 'id',
                    },
                    {
                        data: 'coupon_name',
                    },
                    {
                        data: 'code',
                    },
                    {
                        data: 'discount',
                    },
                    {
                        data: 'quantity',
                    },
                    
                    {
                        data: 'expire_date',
                    },
                  
                    {
                        data: 'status',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });


            // status updates
            $(document).on('click', '#status', function () {
                var id = $(this).data('id');
                var status = $(this).data('status');

                // console.log(id, status);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.coupon.status') }}",
                    data: {
                        // '_token': token,
                        id: id,
                        status: status
                    },
                    success: function (res) {
                        couponTables.ajax.reload();

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
                        console.log(err);
                    }

                })
            })

            // Create Coupon
            $('#createForm').submit(function (e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.coupons.store') }}",
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        console.log(res);
                        if (res.status === true) {
                            $('#create_Modal').modal('hide');
                            $('#createForm')[0].reset();
                            couponTables.ajax.reload();

                            swal.fire({
                                title: "Success",
                                text: `${res.message}`,
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
                    }
                });
            })


            // Edit Category
            $(document).on("click", '#editButton', function (e) {
                let id = $(this).attr('data-id');
                // alert(id);

                $.ajax({
                    type: 'GET',
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    url: "{{ url('admin/coupons/') }}/" + id + "/edit",
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        let data = res.success;
                        // console.log(res)
                        
                        $('#id').val(data.id);
                        $('#up_code').val(data.code);
                        $('#up_discount').val(data.discount);
                        $('#up_amount').val(data.amount);
                        $('#up_expire_date').val(data.expire_date);
                        $('#up_status').val(data.status);
                        
                        $('#EditCoupon').find('#coupon_name').val(data.coupon_name);
                        $('#EditCoupon').find('#quantity').val(data.quantity);
                        $('#EditCoupon').find('#max_used').val(data.max_used);
                        $('#EditCoupon').find('#start_date').val(data.start_date);

                    },
                    error: function (error) {
                        console.log('error');
                    }

                });
            })


            // Update Category
            $("#EditCoupon").submit(function (e) {
                e.preventDefault();

                let id = $('#id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/coupons') }}/" + id,
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {

                        swal.fire({
                            title: "Success",
                            text: "Coupon Edited",
                            icon: "success"
                        })

                        $('#editModal').modal('hide');
                        $('#EditCoupon')[0].reset();
                        couponTables.ajax.reload();
                    },
                    error: function (err) {
                        console.error('Error:', err);
                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                    }
                });

            });


            // Delete Coupon
            $(document).on("click", "#deleteBtn", function () {
                let id = $(this).data('id')

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

                                url: "{{ url('admin/coupons/') }}/" + id,
                                data: {
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                },
                                success: function (res) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: `${res.message}`,
                                        icon: "success"
                                    });

                                    couponTables.ajax.reload();
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
        })


    </script>
@endpush

