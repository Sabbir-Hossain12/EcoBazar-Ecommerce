@extends('backend.layout.master')

@push('title')
    Create Category
@endpush

@push('backendCss')

    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css">
    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
          rel="stylesheet" type="text/css">

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
                <table class="table table-bordered mb-0">

                    <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Category Image</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Front Status</th>
                            <th>TopCategory Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ( $categories->count() > 0 )
                            @foreach ($categories as $row => $category)
                                <tr>
                                    <th scope="row">{{ $row + 1 }}</th>
                                    <td>
                                        <img src="{{ asset($category->category_img) }}" alt="" style="width: 65px;">
                                    </td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->slug  }}</td>
                                    <td>
                                        @if ( $category->front_status == 1 )
                                            <span class="success_badge">Active</span>
                                        @else
                                             <span class="danger_badge">InActive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ( $category->topCategory_status == 1 )
                                            <span class="success_badge">Active</span>
                                        @else
                                             <span class="danger_badge">InActive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ( $category->status == 1 )
                                            <span class="success_badge">Active</span>
                                        @else
                                             <span class="danger_badge">InActive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex gap-3">  
                                            <a class="editButton btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#update_Modal{{ $category->id }}">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>


                                    <!-- Update Modal -->
                                    <div id="update_Modal{{ $category->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Update Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                @php
                                                    $update_cat = App\Models\Category::where('id', $category->id)->first();
                                                @endphp

                                                <div class="modal-body">
                                                    <form action="{{ route('admin.category.update', $update_cat->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf 
                                                        @method('PUT')

                                                        <div class="mb-3">
                                                            <label for="category_name" class="form-label">Category Name</label>
                                                            <input class="form-control" type="text" value="{{ $update_cat->category_name }}" name="category_name" id="category_name" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="category_img" class="form-label">Category Image </label>
                                                            <input type="file" class="form-control" name="category_img" id="category_img">
                                                            <img src="{{ asset($update_cat->category_img) }}" alt="" style="width: 65px;">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Front Status</label>
                                                            <select class="form-select" name="front_status">
                                                                <option value="" disabled>Select</option>
                                                                <option value="1" @if( $update_cat->front_status == 1 ) selected @endif>Active</option>
                                                                <option value="0" @if( $update_cat->front_status == 0 ) selected @endif>Inactive</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">TopCategory Status</label>
                                                            <select class="form-select" name="topCategory_status">
                                                                <option value="" disabled selected>Select</option>
                                                                <option value="1" @if( $update_cat->topCategory_status == 1 ) selected @endif>Active</option>
                                                                <option value="0" @if( $update_cat->topCategory_status == 0 ) selected @endif>Inactive</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <select class="form-select" name="status">
                                                                <option value="" disabled selected>Select</option>
                                                                <option value="1" @if( $update_cat->status == 1 ) selected @endif>Active</option>
                                                                <option value="0" @if( $update_cat->status == 0 ) selected @endif>Inactive</option>
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

                            @endforeach
                        @else
                            <div class="alert alert-danger text-center" role="alert">
                                There is no category Data here!
                            </div>
                        @endif
                        
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