@extends('backend.layout.master')

@push('title')
    Create Category
@endpush

@push('backendCss')

    <link href="{{ asset('public/backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

@endpush

@section('contents')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Category</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Content part Start -->

    <div class="card">

        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">Categories List</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">
                    Create Category
                </button>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0" id="categoryTable">

                    <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Category Image</th>
                            <th>Category Name</th>
                            <th>Front Status</th>
                            <th>TopCategory Status</th>
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
        <div id="create_Modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf 

                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input class="form-control" type="text" name="category_name" id="category_name" required>
                            </div>

                            <div class="mb-3">
                                <label for="category_img" class="form-label">Category Image </label>
                                <input type="file" class="form-control" name="category_img" id="category_img" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Front Status</label>
                                <select class="form-select" name="front_status">
                                    <option value="" disabled selected>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">TopCategory Status</label>
                                <select class="form-select" name="topCategory_status">
                                    <option value="" disabled selected>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
                                <button type="button" class="btn btn-secondary waves-effect me-3" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
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

    $(document).ready(function(){

        var token = $("input[name='_token']").val();

         // Show Data through Datatable
        let CategoryTables = $('#categoryTable').DataTable({
            // order: [
            //     [0, 'desc']
            // ],
            processing: true,
            serverSide: true,
            
            ajax: "{{route('admin.category-data')}}",
            // pageLength: 30,

            columns: [
                {
                    data: 'id',
                },
                {
                    data: 'categoryImg',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'category_name',
                },
                {
                    data: 'frontStatus',
                },
                {
                    data: 'topCategoryStatus',
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


        // Front status updates
        $(document).on('click', '#front-status', function(){
            var id = $(this).data('id');
            var status = $(this).data('status');

            console.log(id, status);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.category.frontStatus') }}",
                data: {
                    '_token': token,
                    id: id,
                    status: status
                },
                success: function (res) {
                    CategoryTables.ajax.reload();
                    if (res.status == 1) {
                       swal.fire(
                        {
                            title: 'Front Status Changed to Active',
                            icon: 'success'
                        })
                    } else {
                       swal.fire(
                        {
                            title: 'Front Status Changed to Inactive',
                            icon: 'success'
                        })
                    }
                },
                error: function(err){
                    console.log(err);
                }

            })
        })

        // TopCategory status updates
        $(document).on('click', '#topCategory_status', function(){
            var id = $(this).data('id');
            var status = $(this).data('status');

            console.log(id, status);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.category.topCategoryStatus') }}",
                data: {
                    '_token': token,
                    id: id,
                    status: status
                },
                success: function (res) {
                    CategoryTables.ajax.reload();

                    if (res.status == 1) {
                       swal.fire(
                        {
                            title: 'Front Status Changed to Active',
                            icon: 'success'
                        })
                    } else {
                       swal.fire(
                        {
                            title: 'Front Status Changed to Inactive',
                            icon: 'success'
                        })
                    }
                },
                error: function(err){
                    console.log(err);
                }

            })
        })

        // TopCategory status updates
        $(document).on('click', '#status', function(){
            var id = $(this).data('id');
            var status = $(this).data('status');

            console.log(id, status);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.category.status') }}",
                data: {
                    '_token': token,
                    id: id,
                    status: status
                },
                success: function (res) {
                    CategoryTables.ajax.reload();
                    
                    if (res.status == 1) {
                       swal.fire(
                        {
                            title: 'Front Status Changed to Active',
                            icon: 'success'
                        })
                    } else {
                       swal.fire(
                        {
                            title: 'Front Status Changed to Inactive',
                            icon: 'success'
                        })
                    }
                },
                error: function(err){
                    console.log(err);
                }

            })
        })
    })


    </script>
@endpush

