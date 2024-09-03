

@extends('backend.layout.master')


@push('title')
    Create SubCategory
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
                <h4 class="mb-sm-0 font-size-18">SubCategory</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">SubCategory</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Content part Start -->

    <div class="card">

        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">SubCategories List</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">
                    Create SubCategory
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0  nowrap w-100 dataTable no-footer dtr-inline" id="subCategoryTable" style="text-align: center">

                    <thead>
                    <tr>
                        <th>#SL.</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>SubCategory Name</th>
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
                        <h5 class="modal-title" id="myModalLabel">Add New SubCategory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        {{-- method="POST" action="{{ route('admin.category.store') }}" --}}
                        <form id="createForm" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <select class="form-select" name="category_id">
                                    <option value="" disabled selected>Select</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>      
                                        @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="subcategory_name" class="form-label">SubCategory Name</label>
                                <input class="form-control" id="subcategory_name" type="text" name="subcategory_name" required>
                            </div>

                            <div class="mb-3">
                                <label for="subcategory_img" class="form-label">SubCategory Image </label>
                                <input type="file" class="form-control" name="subcategory_img" id="subcategory_img" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="" disabled selected>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
                        <form id="EditSubCategory" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <input type="text" name="id" id="id" hidden>

                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <select class="form-select" name="category_id" id="up_category_id">
                                    <option value="" disabled selected>Select</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>      
                                        @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="up_subcat_name" class="form-label">SubCategory Name</label>
                                <input class="form-control" id="up_subcat_name" type="text" name="subcategory_name" required>
                            </div>

                            <div class="mb-3">
                                <label for="subcategory_img" class="form-label">SubCategory Image </label>
                                <input type="file" class="form-control" name="subcategory_img" id="subcategory_img">

                                <div id="imageShow"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="up_status" name="status">
                                    <option value="" disabled selected>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
            let subCategoryTables = $('#subCategoryTable').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,

                ajax: "{{ route('admin.subcategory-data') }}",
                // pageLength: 30,

                columns: [
                    {
                        data: 'id',
                    },
                    {
                        data: 'subCategoryImg',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'category_name',
                    },
                    {
                        data: 'subcategory_name',
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

                console.log(id, status);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.subcategory.status') }}",
                    data: {
                        // '_token': token,
                        id: id,
                        status: status
                    },
                    success: function (res) {
                        subCategoryTables.ajax.reload();

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

            // Create SubCategory
            $('#createForm').submit(function (e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.subcategory.store') }}",
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        console.log(res);
                        if (res.status === true) {
                            $('#create_Modal').modal('hide');
                            $('#createForm')[0].reset();
                            subCategoryTables.ajax.reload();

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
                    url: "{{ url('admin/subcategories') }}/" + id + "/edit",
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        let data = res.success;
                        // console.log(res)
                        
                        $('#id').val(data.id);
                        $('#up_category_id').val(data.category_id);
                        $('#up_subcat_name').val(data.subcategory_name);
                        $('#imageShow').html('');
                        $('#imageShow').append(`
                            <img src={{ asset("`+ data.subcategory_img +`") }} alt="" style="width: 75px;">
                        `);
                        $('#up_status').val(data.status);

                    },
                    error: function (error) {
                        console.log('error');
                    }

                });
            })


            // Update Category
            $("#EditSubCategory").submit(function (e) {
                e.preventDefault();

                let id = $('#id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/subcategories') }}/" + id,
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {

                        swal.fire({
                            title: "Success",
                            text: "Category Edited",
                            icon: "success"
                        })

                        $('#editModal').modal('hide');
                        $('#EditSubCategory')[0].reset();
                        subCategoryTables.ajax.reload();
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


            // Delete Category
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

                                url: "{{ url('admin/subcategories') }}/" + id,
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

                                    subCategoryTables.ajax.reload();
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

