@extends('backend.layout.master')

@push('backendCss')
    {{--    <meta name="csrf_token" content="{{ csrf_token() }}" />--}}

    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css">
    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
          rel="stylesheet" type="text/css">

@endpush

@section('contents')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Sliders</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Sliders</li>
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
                        <h4 class="card-title">Slider List</h4>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSliderModal">
                            Add Slider
                        </button>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0  nowrap w-100 dataTable no-footer dtr-inline" id="sliderTable">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

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

    {{--    Create Slider Modal--}}
    <div class="modal fade" id="createSliderModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="form" id="createSlider">
                        @csrf

                        <div class="mb-3">
                            <label for="Name" class="col-form-label">Slider Image</label>
                            <input type="file" class="form-control" id="cSlider_img" name="slider_img">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Slider Title 1</label>
                            <input type="text" class="form-control" id="cSliderTitle1" name="slider_title_1">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="col-form-label">Slider Title 2</label>
                            <input type="text" class="form-control" id="cSliderTitle2" name="slider_title_2">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="col-form-label">Slider Title 3</label>
                            <input type="text" class="form-control" name="slider_title_3" id="cSliderTitle3">
                        </div>
                        <div class="mb-3">
                            <label for="cSliderText" class="col-form-label">Slider Text</label>
                            <textarea class="form-control" id="cSliderText" name="slider_text"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="col-form-label">Slider Button Name</label>
                            <input type="text" class="form-control" name="slider_btn_name" id="cSliderTitle3">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="col-form-label">Slider Button Link</label>
                            <input type="text" class="form-control" name="slider_btn_link" id="cSliderTitle3">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--    Edit Slider Modal--}}
    <div class="modal fade" id="editSliderModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="form2" id="editSlider">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="Name" class="col-form-label">Slider Image</label>
                            <input type="file" class="form-control" id="eSlider_img" name="slider_img">
                            <img src="" class="mt-2" id="eSliderImage" width="100%" height="200px" alt="Slider Image">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Slider Title 1</label>
                            <input type="text" class="form-control" id="eSliderTitle1" name="slider_title_1">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="col-form-label">Slider Title 2</label>
                            <input type="text" class="form-control" id="eSliderTitle2" name="slider_title_2">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="col-form-label">Slider Title 3</label>
                            <input type="text" class="form-control" name="slider_title_3" id="eSliderTitle3">
                        </div>
                        <div class="mb-3">
                            <label for="cSliderText" class="col-form-label">Slider Text</label>
                            <textarea class="form-control" id="eSliderText" name="slider_text"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="col-form-label">Slider Button Name</label>
                            <input type="text" class="form-control" name="slider_btn_name" id="eSliderBtnName">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="col-form-label">Slider Button Link</label>
                            <input type="text" class="form-control" name="slider_btn_link" id="eSliderBtnLink">
                        </div>

                        <input id="id" type="number" hidden>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    </form>
                </div>
            </div>
        </div>
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
            let sliderTable = $('#sliderTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{route('admin.slider-data')}}",
                // pageLength: 30,

                columns: [
                    {
                        data: 'id',


                    },
                    {
                        data: 'sliderImage',

                    },
                    {
                        data: 'slider_title_1',

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


            // Create Slider
            $('#createSlider').submit(function (e) {
                e.preventDefault();

                let formData = new FormData(this);
                // console.log(formData)
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.slider.store') }}",
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        if (res.message === 'success') {
                            $('#createSliderModal').modal('hide');
                            $('#createSlider')[0].reset();
                            sliderTable.ajax.reload()
                            swal.fire({
                                title: "Success",
                                text: "Slider Created !",
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

            // Read Slider Data
            $(document).on('click', '.editButton', function () {
                let id = $(this).data('id');
                $('#id').val(id);

                $.ajax(
                    {
                        type: "GET",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('admin/sliders') }}/" + id + "/edit",
                        data: {
                            id: id
                        },

                        processData: false,  // Prevent jQuery from processing the data
                        contentType: false,  // Prevent jQuery from setting contentType
                        success: function (res) {

                           
                         
                            $('#eSliderTitle1').val(res.data.slider_title_1);
                            $('#eSliderTitle2').val(res.data.slider_title_2);
                            $('#eSliderTitle3').val(res.data.slider_title_3);
                            $('#eSliderText').val(res.data.slider_text);
                            $('#eSliderBtnName').val(res.data.slider_btn_name);
                            $('#eSliderBtnLink').val(res.data.slider_btn_link);
                            $('#eSliderImage').attr('src','{{ asset('') }}' + res.data.slider_img);


                        },
                        error: function (err) {
                            console.log('failed')
                        }
                    }
                )
            })

            // Edit Slider Data
            $('#editSlider').submit(function (e) {
                e.preventDefault();
                let id = $('#id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/sliders') }}/" + id,
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        if (res.message === 'success') {
                            $('#editSliderModal').modal('hide');
                            $('#editSlider')[0].reset();
                            sliderTable.ajax.reload()
                            swal.fire({
                                title: "Success",
                                text: "Slider Edited !",
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


            // Delete Slider
            $(document).on('click', '#deleteSliderBtn', function () {
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

                                url: "{{ url('admin/sliders') }}/" + id,
                                data: {
                                    '_token': token
                                },
                                success: function (res) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Slider has been deleted.",
                                        icon: "success"
                                    });

                                    sliderTable.ajax.reload();
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

            // Change Slider Status
            $(document).on('click', '#adminStatus', function () {
                let id = $(this).data('id');
                let status = $(this).data('status')
              
                $.ajax(
                    {
                        type: 'post',
                        url: "{{route('admin.slider.status')}}",
                        data: {
                            '_token': token,
                            id: id,
                            status: status

                        },
                        success: function (res) {
                            sliderTable.ajax.reload();

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