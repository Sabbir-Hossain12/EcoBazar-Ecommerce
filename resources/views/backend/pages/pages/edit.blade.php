@extends('backend.layout.master')

@push('backendCss')


@endpush

@section ('contents')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Page <span class="text-primary"> {{$data->title}}</span></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Edit Page</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <form method="post" action="{{route('admin.pages.update',$data->id)}}">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Page Information</h4>

                    </div>
                    <div class="card-body p-4">

                        <div class="row">
                            @if(Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    {{Session::get('error_message')}}
                                </div>
                            @endif
                            @if(Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {{Session::get('success_message')}}
                                </div>
                            @endif
                            <div class="col-lg-6">


                                <div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input class="form-control" type="text" placeholder="Page Title"
                                               id="title" name="title" value="{{$data->title}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pageStatus" class="form-label">Select</label>
                                        <select id="pageStatus" class="form-select" name="status">
                                            <option>Select</option>
                                            <option {{$data->status==1 ? 'selected' : ''}}  value="1">Active</option>
                                            <option {{$data->status==0 ? 'selected' : ''}}  value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="url" class="form-label">URL</label>
                                        <textarea id="url" name="url" class="form-control">{{$data->url}}</textarea>
                                    </div>


                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input class="form-control" type="text" placeholder="Meta Title"
                                           id="meta_title" name="meta_title" value="{{$data->meta_title}}">
                                </div>
                                <div class="mb-3">
                                    <label for="meta_keyword" class="form-label">Meta Keywords</label>
                                    <input class="form-control" type="text" placeholder="Enter Meta Keywords"
                                           id="meta_keyword" name="meta_keywords" value="{{$data->meta_keywords}}">
                                </div>
                                <div class="mb-3">
                                    <label for="meta_desc" class="form-label">Meta Description</label>
                                    <textarea id="meta_desc" name="meta_desc" class="form-control">{{$data->meta_desc}}</textarea>
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
                        <h4 class="card-title text-center">Page Description</h4>

                    </div>
                    <div class="card-body p-4">

                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="mb-3">

                                        <textarea id="page_desc" name="desc" class="form-control">{{$data->desc}}</textarea>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="text-center mt-4 d-grid">
                            <button type="submit" class="btn  btn-primary">Update</button>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </form>
@endsection

@push('backendJs')

    {{--  CkEditor CDN  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function () {

            ClassicEditor
                .create( document.querySelector( '#page_desc' ) )
                .catch( error => {
                    console.error( error );
                } );
        });


    </script>
@endpush