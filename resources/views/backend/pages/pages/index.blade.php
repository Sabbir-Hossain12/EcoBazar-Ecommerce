@extends('backend.layout.master')

@push('backendCss')
    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

@endpush

@section ('contents')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Pages</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Pages</li>
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
                        <h4 class="card-title">Pages List</h4>
                        <a class="btn btn-primary" href="{{route('admin.pages.create')}}">
                            Create Page
                        </a>
                    </div>
                    {{--                    <p class="card-title-desc">--}}
                    {{--                        Create responsive tables by wrapping any <code>.table</code> in--}}
                    {{--                        <code>.table-responsive</code>--}}
                    {{--                        to make them scroll horizontally on small devices (under 768px).--}}
                    {{--                    </p>--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0" id="pagesTable">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <th scope="row">{{$page->id}}</th>
                                    <td>{{$page->title}}</td>

                                    <td>
                                        @if($page->status===1)
                                            <a class="status" id="page-{{$page->id}}" href="javascript:void(0)"
                                               data-id="{{$page->id}}" data-status="{{$page->status}}"> <i
                                                        class="fa-solid fa-toggle-on fa-2x"></i>
                                            </a>
                                        @endif
                                        @if($page->status===0)
                                            <a class="status" id="page-{{$page->id}}" href="javascript:void(0)"
                                               data-id="{{$page->id}}" data-status="{{$page->status}}"> <i
                                                        class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                                            </a>
                                        @endif
                                    </td>

                                    <td class="d-flex gap-1">
                                        <div>
                                        <a class="btn btn-sm btn-primary" href="{{route('admin.pages.edit',$page->id)}}" ><i
                                                    class="fas fa-edit"></i></a>
                                        </div>
                                        <form method="post" id="delete-form-{{$page->id}}" action="{{route('admin.pages.destroy',$page->id)}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button onclick="confirmDel( {{$page->id}} )" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
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
                // Delete Resource
                $(document).ready(function () {
                    
                    
                    $('#pagesTable').dataTable();
                    
                    // Update Status
                    $('.status').on('click', function () {
                        let id = $(this).data('id');
                        let status = $(this).data('status')
                        console.log(id)
                        console.log(status)
                        $.ajax(
                            {
                                type: "post",
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                                url: "change-pages-status",
                                data: {
                                    id: id,
                                    status: status
                                },
                                success: function (res) {
                                    if (res.status == 1) {
                                        $('#page-' + id).html('<i class="fa-solid fa-toggle-on fa-2x"></i>')

                                        Swal.fire({
                                            // title: "Good job!",
                                            text: "Status Changed to Active",
                                            icon: "success"
                                        });
                                    } else if (res.status == 0) {
                                        $('#page-' + id).html('<i class="fa-solid fa-toggle-off fa-2x"></i>')
                                        Swal.fire({
                                            // title: "Good job!",
                                            text: "Status Changed to Inactive",
                                            icon: "success"
                                        });
                                    }

                                    setTimeout( function () {

                                        location.reload();
                                    },1000)

                                },
                                error: function (err) {
                                    console.log(err)
                                }

                            }
                        )
                    })
                    
                   
                    


                });
                
            //  Delete Resource
                function confirmDel(id) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + id).submit();
                            Swal.fire({
                                title: 'Page Deleted !',
                                icon: 'success',
                            });
                            
                        }
                    })
                }
                


            </script>
@endpush